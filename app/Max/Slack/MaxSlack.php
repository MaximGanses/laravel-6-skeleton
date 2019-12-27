<?php


namespace App\Max\Slack;



use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Notification;

class MaxSlack extends Notification
{
    private $defaultChannel;
    public function __construct()
    {
        $this->defaultChannel = Env::get('SLACK_DEFAULT_CHANNEL'.'#general');
    }

    /** @param false | string $channel */
    public function sendSlackMessage(string $message, $channel = false)
    {
        $channel = $channel ? $channel : $this->defaultChannel;
        Notification::route('slack', env('SLACK_HOOK'))
            ->notify(new MaxSlackMessage($message, $channel));
    }
}