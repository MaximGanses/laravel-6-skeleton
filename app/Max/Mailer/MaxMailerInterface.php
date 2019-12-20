<?php

use Illuminate\Support\Facades\Config as ConfigAlias;

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
     * @param string $sender
     * @return mixed
     */
    public function sendMail(string $receiver, string $sender = 'default');

    /**
     * @param array $receivers
     * @param string $sender
     */
    public function sendBulkMail(array $receivers, string $sender = 'default');

    public function createMessage();
}
