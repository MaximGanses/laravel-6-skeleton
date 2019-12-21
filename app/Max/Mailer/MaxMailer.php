<?php


namespace App\Max\Mailer;


use App\Mail\TestMail;
use App\Max\MaxEasyInterval;
use DateInterval;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;


class MaxMailer implements MaxMailerInterface
{
    public function sendMail(string $receiver, Mailable $mailable, string $sender = null)
    {
        Mail::to($receiver)
            ->locale(App::getLocale())
            ->queue($mailable);
    }

    public function sendBulkMail(array $receivers, Mailable $mailable, string $sender = null)
    {
        Mail::to($receivers)
            ->locale(App::getLocale())
            ->queue($mailable);
    }

    public function sendDelayedEmail(string $receiver, Mailable $mailable, MaxEasyInterval $interval, string $sender = null)
    {
        Mail::to($receiver)
            ->locale(App::getLocale())
            ->later($interval->getDateInterval(), $mailable);
    }
}
