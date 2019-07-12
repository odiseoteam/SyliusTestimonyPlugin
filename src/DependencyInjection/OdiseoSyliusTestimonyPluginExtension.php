<?php

declare(strict_types=1);

namespace Odiseo\SyliusTestimonyPlugin\DependencyInjection;

use Exception;
use Sylius\Bundle\ResourceBundle\DependencyInjection\Extension\AbstractResourceExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class OdiseoSyliusTestimonyPluginExtension extends AbstractResourceExtension
{
    /**
     * {@inheritdoc}
     * @throws Exception
     */
    public function load(array $config, ContainerBuilder $container): void
    {
        $config = $this->processConfiguration($this->getConfiguration([], $container), $config);
    }
}
