<?php

namespace App\Http\Controllers;


use App\Mail\TestMail;
use App\Max\Mailer\MaxMailer;
use App\Max\MaxEasyInterval;

class MailController extends Controller
{
    public function testAction(MaxMailer $mailer)
    {
        $mailer->sendMail('test@test.be',new TestMail());
        dump('mail send');
    }

    public function testDelayedAction(MaxMailer $mailer)
    {
        try {
            $mailer->sendDelayedEmail('test@test.be', new TestMail(), new MaxEasyInterval(1, 5));
            dump('Delayed mail send');
        } catch (\Exception $e) {
            dump($e->getMessage());
        }

    }

    public function testBulkAction(MaxMailer $mailer)
    {
        $mailer->sendBulkMail(['test@test.be','test2@test.be'],new TestMail());
        dump('Bulk mail send');
    }

}
