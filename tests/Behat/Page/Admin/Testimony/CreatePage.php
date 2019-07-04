<?php

declare(strict_types=1);

namespace Tests\Odiseo\SyliusTestimonyPlugin\Behat\Page\Admin\Testimony;

use Sylius\Behat\Page\Admin\Crud\CreatePage as BaseCreatePage;

class CreatePage extends BaseCreatePage
{
    /**
     * @inheritdoc
     */
    public function fillTitle($title)
    {
        $this->getDocument()->fillField('Title', $title);
    }

    /**
     * @inheritdoc
     */
    public function fillDescription($description)
    {
        $this->getDocument()->fillField('Description', $description);
    }
}
