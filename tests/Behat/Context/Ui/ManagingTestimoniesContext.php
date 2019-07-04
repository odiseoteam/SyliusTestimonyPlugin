<?php

declare(strict_types=1);

namespace Tests\Odiseo\SyliusTestimonyPlugin\Behat\Context\Ui;

use Behat\Behat\Context\Context;
use FriendsOfBehat\PageObjectExtension\Page\SymfonyPageInterface;
use Odiseo\SyliusTestimonyPlugin\Entity\Testimony;
use Sylius\Behat\Service\NotificationCheckerInterface;
use Sylius\Behat\Service\Resolver\CurrentPageResolverInterface;
use Tests\Odiseo\SyliusTestimonyPlugin\Behat\Page\Admin\Testimony\CreatePage;
use Tests\Odiseo\SyliusTestimonyPlugin\Behat\Page\Admin\Testimony\IndexPage;
use Webmozart\Assert\Assert;

final class ManagingTestimoniesContext implements Context
{
    /** @var CurrentPageResolverInterface */
    private $currentPageResolver;

    /** @var NotificationCheckerInterface */
    private $notificationChecker;

    /** @var IndexPage */
    private $indexPage;

    /** @var CreatePage */
    private $createPage;

    /**
     * @param CurrentPageResolverInterface $currentPageResolver
     * @param NotificationCheckerInterface $notificationChecker
     * @param IndexPage $indexPage
     * @param CreatePage $createPage
     */
    public function __construct(
        CurrentPageResolverInterface $currentPageResolver,
        NotificationCheckerInterface $notificationChecker,
        IndexPage $indexPage,
        CreatePage $createPage
    ) {
        $this->currentPageResolver = $currentPageResolver;
        $this->notificationChecker = $notificationChecker;
        $this->indexPage = $indexPage;
        $this->createPage = $createPage;
    }

    /**
     * @When I go to the testimonies page
     * @When I want to browse testimonies
     * @throws \FriendsOfBehat\PageObjectExtension\Page\UnexpectedPageException
     */
    public function iGoToTheTestimoniesPage(): void
    {
        $this->indexPage->open();
    }

    /**
     * @Given I want to add a new testimony
     * @throws \FriendsOfBehat\PageObjectExtension\Page\UnexpectedPageException
     */
    public function iWantToAddNewTestimony()
    {
        $this->createPage->open(); // This method will send request.
    }

    /**
     * @When I fill the title with :testimonyTitle
     * @When I rename it to :testimonyTitle
     * @param $testimonyTitle
     * @throws \Behat\Mink\Exception\ElementNotFoundException
     */
    public function iFillTheTitleWith($testimonyTitle)
    {
        $this->createPage->fillTitle($testimonyTitle);
    }

    /**
     * @When I fill the description with :testimonyDescription
     * @When I change the description with :testimonyDescription
     * @param $testimonyDescription
     * @throws \Behat\Mink\Exception\ElementNotFoundException
     */
    public function iFillTheDescriptionWith($testimonyDescription)
    {
        $this->createPage->fillDescription($testimonyDescription);
    }

    /**
     * @When I add it
     * @throws \Behat\Mink\Exception\ElementNotFoundException
     */
    public function iAddIt()
    {
        $this->createPage->create();
    }

    /**
     * @Then I should see :quantity testimonies in the list
     * @param $quantity
     */
    public function iShouldSeeTestimoniesInTheList(int $quantity = 1): void
    {
        Assert::same($this->indexPage->countItems(), (int) $quantity);
    }

    /**
     * @Then /^the (testimony "([^"]+)") should appear in the admin/
     * @param Testimony $testimony
     * @throws \FriendsOfBehat\PageObjectExtension\Page\UnexpectedPageException
     */
    public function testimonyShouldAppearInTheAdmin(Testimony $testimony)
    {
        $this->indexPage->open();

        //Webmozart assert library.
        Assert::true(
            $this->indexPage->isSingleResourceOnPage(['title' => $testimony->getTitle()]),
            sprintf('Testimony %s should exist but it does not', $testimony->getTitle())
        );
    }

    /**
     * @return IndexPage|CreatePage|SymfonyPageInterface
     */
    private function resolveCurrentPage(): SymfonyPageInterface
    {
        return $this->currentPageResolver->getCurrentPageWithForm([
            $this->indexPage,
            $this->createPage,
        ]);
    }
}
