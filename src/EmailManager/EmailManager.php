<?php

namespace Odiseo\SyliusTestimonyPlugin\EmailManager;

use Odiseo\SyliusTestimonyPlugin\Entity\Testimony;
use Sylius\Component\Mailer\Sender\SenderInterface;

class EmailManager
{
    /** @var SenderInterface */
    private $emailSender;

    public function __construct(SenderInterface $emailSender)
    {
        $this->emailSender = $emailSender;
    }

    /**
     * @param Testimony $testimony
     */
    public function sendTestimonyApprovedEmail(Testimony $testimony): void
    {

        $this->emailSender->send('testimony_approved',
            ['diego@odiseo.com.ar'],
            ['testimony' => $testimony]
        )
        ;
    }
}
