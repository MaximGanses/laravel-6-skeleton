<?php


namespace App\Max\Slack;


interface MaxSlackInterface
{

    public function sendSlackMessage(string $from,string $to,MaxSlackMessage $maxSlackMessage);
    public function createMessage(): MaxSlackMessage;
    public function sendDefaultSlackMessage(string $to, MaxSlackMessage $maxSlackMessage);
}