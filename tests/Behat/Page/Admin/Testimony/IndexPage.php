<?php

declare(strict_types=1);

namespace Tests\Odiseo\SyliusTestimonyPlugin\Behat\Page\Admin\Testimony;

use Sylius\Behat\Page\Admin\Crud\IndexPage as BaseIndexPage;

class IndexPage extends BaseIndexPage
{
    /**
     * @inheritdoc
     */
    public function deleteTestimony($title)
    {
        $this->deleteResourceOnPage(['title' => $title]);
    }
}
