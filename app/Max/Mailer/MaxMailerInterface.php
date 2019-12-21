<?php

namespace App\Max\Mailer;

use Illuminate\Mail\Mailable;

interface MaxMailerInterface
{
    /**
     *
     * Send mail to single receiver
     * Default sender message set in .env file
     *
     */

    /**
     * @param string $receiver
     * @param Mailable $mailable
     * @param string $sender
     * @return mixed
     */
    public function sendMail(string $receiver, Mailable $mailable ,string $sender = 'default');

    /**
     * @param array $receivers
     * @param string $sender
     */
    public function sendBulkMail(array $receivers,Mailable $mailable, string $sender = 'default');
}
