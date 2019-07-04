<?php

namespace spec\Odiseo\SyliusTestimonyPlugin\Entity;

use Odiseo\SyliusTestimonyPlugin\Entity\Testimony;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;

class TestimonySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Testimony::class);
    }

    function it_implements_translatable_interface(): void
    {
        $this->shouldImplement(TranslatableInterface::class);
    }

    function it_implements_resource_interface(): void
    {
        $this->shouldImplement(ResourceInterface::class);
    }

    function it_implements_timestamplable_interface(): void
    {
        $this->shouldImplement(TimestampableInterface::class);
    }

    function it_has_no_id_by_default(): void
    {
        $this->getId()->shouldReturn(null);
    }

    function it_has_no_title_by_default(): void
    {
        $this->setCurrentLocale('en');
        $this->getTitle()->shouldReturn(null);
    }

    function it_is_timestampable(): void
    {
        $dateTime = new \DateTime();
        $this->setCreatedAt($dateTime);
        $this->getCreatedAt()->shouldReturn($dateTime);
        $this->setUpdatedAt($dateTime);
        $this->getUpdatedAt()->shouldReturn($dateTime);
    }

    function it_allows_access_via_properties(): void
    {
        $this->setState('pending');
        $this->getState()->shouldReturn('pending');
        $this->setCurrentLocale('en');
        $this->setTitle('Testimonio 1');
        $this->getTitle()->shouldReturn('Testimonio 1');
        $this->setDescription('Este es un testimonio 1');
        $this->getDescription()->shouldReturn('Este es un testimonio 1');
    }
}
