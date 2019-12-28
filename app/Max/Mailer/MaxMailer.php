<?php


namespace App\Max\Mailer;


use App\Mail\TestMail;
use App\Max\MaxEasyInterval;
use DateInterval;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailer;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;


class MaxMailer extends Notification implements MaxMailerInterface, ShouldQueue
{
    public $connection = 'redis';
    public $queue = 'email';
    public $delay = 0;

    public function tags()
    {
        return ['mail', 'Mail'];
    }

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

    /**
     * Get the notification's delivery channels.
     *
     * @return array
     */
    public function via()
    {
        return ['mail'];
    }

    public function toMail()
    {

    }
}
