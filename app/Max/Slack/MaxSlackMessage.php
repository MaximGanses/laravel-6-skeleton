<?php


namespace App\Max\Slack;


class MaxSlackMessage
{
    /** @var string */
    public $content;

    /** @var array | false */
    public $attachment;

    /** @var mixed */
    public $styling;

    public static function createFromForm($request, $content, $styling, $attachment = false): self
    {
        //TODO implement request
        $message = new self();
        $message->content = $content;
        $message->styling = $styling;
        if ($attachment) {
            $message->attachment = $attachment;
        }
        return $message;
    }

    public static function createMessage($content, $styling, $attachment = false): self
    {
        $message = new self();
        $message->content = $content;
        $message->styling = $styling;
        if ($attachment) {
            $message->attachment = $attachment;
        }
        return $message;
    }

}