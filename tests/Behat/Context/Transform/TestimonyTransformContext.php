<?php

declare(strict_types=1);

namespace Tests\Odiseo\SyliusTestimonyPlugin\Behat\Context\Transform;

use Behat\Behat\Context\Context;
use Doctrine\ORM\EntityRepository;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Webmozart\Assert\Assert;

class TestimonyTransformContext implements Context
{
    /**
     * @var EntityRepository
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
        $testimony = $this->testimonyRepository->createQueryBuilder('o')
            ->leftJoin('o.translations', 'translation')
            ->andWhere('translation.title = :title')
            ->setParameter('title', $testimonyTitle)
            ->getQuery()
            ->setMaxResults(1)
            ->getOneOrNullResult()
        ;

        Assert::notNull(
            $testimony,
            'Testimony with title %s does not exist'
        );

        return $testimony;
    }
}
