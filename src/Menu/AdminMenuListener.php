<?php

namespace Odiseo\SyliusTestimonyPlugin\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

class AdminMenuListener
{
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $testimony = $menu->getChild('catalog')
            ->addChild('testimony', ['route' => 'odiseo_sylius_testimony_admin_testimony_index'])
            ->setLabel('odiseo_sylius_testimony.ui.testimonies')
            ->setLabelAttribute('icon', 'talk')
        ;
    }
}
