<?php

declare(strict_types=1);

namespace Tests\Odiseo\SyliusTestimonyPlugin\Behat\Context\Setup;

use Behat\Behat\Context\Context;
use Doctrine\ORM\EntityManagerInterface;
use Odiseo\SyliusTestimonyPlugin\Entity\Testimony;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

class TestimonySetupContext implements Context
{
    /** @var SharedStorageInterface */
    private $sharedStorage;

    /** @var FactoryInterface */
    private $testimonyFactory;

    /** @var RepositoryInterface */
    private $testimonyRepository;

    /** @var EntityManagerInterface */
    private $entityManager;

    public function __construct(
        SharedStorageInterface $sharedStorage,
        FactoryInterface $testimonyFactory,
        RepositoryInterface $testimonyRepository,
        EntityManagerInterface $entityManager
    ) {
        $this->sharedStorage = $sharedStorage;
        $this->testimonyFactory = $testimonyFactory;
        $this->testimonyRepository = $testimonyRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @param $quantity
     * @Given the store has( also) :quantity testimonies
     */
    public function theStoreHasTestimonies($quantity)
    {
        for ($i = 1;$i <= $quantity;$i++) {
            $this->saveTestimony($this->createTestimony('Test'.$i));
        }
    }

    /**
     * @param string $title
     *
     * @return Testimony
     */
    private function createTestimony(string $title): Testimony
    {
        /** @var Testimony $testimony */
        $testimony = $this->testimonyFactory->createNew();

        $testimony->setCurrentLocale('en_US');
        $testimony->setFallbackLocale('en_US');
        $testimony->setTitle($title);
        $testimony->setDescription('This is a test');

        return $testimony;
    }

    /**
     * @param Testimony $testimony
     */
    private function saveTestimony(Testimony $testimony): void
    {
        $this->testimonyRepository->add($testimony);
    }
}
