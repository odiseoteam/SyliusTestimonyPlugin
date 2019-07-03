<?php

declare(strict_types=1);

namespace Odiseo\SyliusTestimonyPlugin;

use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class OdiseoSyliusTestimonyPlugin extends Bundle
{
    use SyliusPluginTrait;
}
