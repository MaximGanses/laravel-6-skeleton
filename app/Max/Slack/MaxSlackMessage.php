<?php


namespace App\Max\Slack;


use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Env;

class MaxSlackMessage extends Notification implements ShouldQueue
{
    private $defaultFrom;
    private $defaultIcon;
    private $channel;
    private $message;

    public $connection = 'redis';
    public $queue = 'slack';
    public $delay = 0;

    public function __construct(string $message,string $channel = '#general', $icon = ':ghost:')
    {
        $this->message = $message;
        $this->defaultFrom = Env::get('SLACK_DEFAULT_SENDER', 'Ghost');
        $this->defaultIcon = ':ghost:';
        $this->channel = $channel;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @return array
     */
    public function via()
    {
        return ['slack'];
    }

    public function toSlack()
    {
        $message = $this->message;

        return (new SlackMessage)
            ->from($this->defaultFrom, $this->defaultIcon)
            ->to($this->channel)
            ->content($message);
    }

    public function tags()
    {
        return ['slack', 'message:'. $this->message];
    }
}