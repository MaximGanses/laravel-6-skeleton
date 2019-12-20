<?php


namespace App\Max\Slack;


use Illuminate\Support\Env;

class MaxSlack implements MaxSlackInterface
{

    private $defaultFrom;

    public function __construct()
    {
        $this->defaultFrom = Env::get('SLACK_DEFAULT_SENDER', 'Ghost');
    }

    public function sendSlackMessage(string $from, string $to, MaxSlackMessage $maxSlackMessage)
    {
        // TODO: Implement sendSlackMessage() method.
    }

    public function createMessage(): MaxSlackMessage
    {
        // TODO: Implement createMessage() method.
    }

    public function sendDefaultSlackMessage(string $to, MaxSlackMessage $maxSlackMessage)
    {
        // TODO: Implement sendDefaultSlackMessage() method.
    }
}