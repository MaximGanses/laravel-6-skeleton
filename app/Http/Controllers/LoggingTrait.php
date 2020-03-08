<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\Log;
use Psr\Log\LogLevel;

trait LoggingTrait
{

    /**
     * @param string $level
     * @param string $message
     * @param array|null $info
     */
    public function LogUsers(string $level, string $message, array $info = []): void
    {
        Log::channel('users')->log($level,$message,$info);
    }
}