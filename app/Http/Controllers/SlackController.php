<?php

namespace App\Http\Controllers;


use App\Max\Mailer\MaxMailer;
use App\Max\Slack\MaxSlack;
use App\Notifications\TestNotification;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\App;

class SlackController extends Controller
{
    public function testAction(MaxSlack $maxSlack)
    {
        try {
            $maxSlack->sendSlackMessage('message', '#random');
        } catch (ClientException $exception) {
            dump('Channel not found');
        }
    }
}
