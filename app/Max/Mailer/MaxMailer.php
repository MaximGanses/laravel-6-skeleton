<?php


namespace App\Max\Mailer;


use App\Mail\TestMail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use MaxMailerInterface;

class MaxMailer implements MaxMailerInterface
{
    public function sendMail(string $receiver, string $sender = null)
    {
        $sender = $this->checkDefaultSender($sender);
        Mail::to('test@hotmail.com')
            ->send(new TestMail());
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
        return null === $sender ? $this->defaultMailer : $sender;
    }
}
