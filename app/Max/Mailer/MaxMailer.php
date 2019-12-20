<?php


namespace App\Max\Mailer;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use MaxMailerInterface;

class MaxMailer implements MaxMailerInterface
{
    /** @var string */
    public $defaultMailer;

    public function __construct()
    {
        $this->defaultMailer = Config::get('MAIL_DEFAULT_FROM');
    }

    public function sendMail(string $receiver, string $sender = null)
    {
        $sender = $this->checkDefaultSender($sender);
        // TODO: Implement sendMail() method.
    }

    public function sendBulkMail(array $receivers, string $sender = null)
    {
        $sender = $this->checkDefaultSender($sender);
        // TODO: Implement sendBulkMail() method.
    }

    public function createMessage()
    {
        // TODO: Implement createMessage() method.
    }

    /** @param string | null $sender */
    public function checkDefaultSender($sender)
    {
        return null === $sender? $this->defaultMailer : $sender;
    }
}
