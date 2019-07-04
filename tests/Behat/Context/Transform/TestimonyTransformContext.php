<?php

declare(strict_types=1);

namespace Tests\Odiseo\SyliusVendorPlugin\Behat\Context\Transform;

use Behat\Behat\Context\Context;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Webmozart\Assert\Assert;

class TestimonyTransformContext implements Context
{
    /**
     * @var RepositoryInterface
     */
    private $testimonyRepository;

    /**
     * @param RepositoryInterface $testimonyRepository
     */
    public function __construct(
        RepositoryInterface $testimonyRepository
    ) {
        $this->testimonyRepository = $testimonyRepository;
    }

    /**
     * @Transform /^testimony "([^"]+)"$/
     * @Transform /^"([^"]+)" testimony/
     */
    public function getTestimonyByTitle($testimonyTitle)
    {
        $testimony = $this->testimonyRepository->findOneBy(['title' => $testimonyTitle]);

        Assert::notNull(
            $testimony,
            'Testimony with title %s does not exist'
        );

        return $testimony;
    }
}
