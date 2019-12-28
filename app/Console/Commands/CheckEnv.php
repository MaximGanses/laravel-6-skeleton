<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckEnv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:env';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks env for fields';
    private $fields = [
        'MAIL_DRIVER',
        'MAIL_HOST',
        'MAIL_PORT',
        'MAIL_USERNAME',
        'MAIL_PASSWORD',
        'MAIL_FROM_ADDRESS',
        'MAIL_FROM_NAME',
        'SLACK_DEFAULT_SENDER',
        'SLACK_DEFAULT_CHANNEL',
        'SLACK_HOOK',
        'HORIZON_EMAIL',
        'SENTRY_LARAVEL_DSN',
        'DB_CONNECTION',
        'DB_HOST',
        'DB_PORT',
        'DB_DATABASE',
        'DB_USERNAME',
        'DB_PASSWORD',
        'APP_DEFAULT_LOCALE',
        'APP_LOCALES',
        'APP_KEY',
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach ($this->fields as $field) {
            $result = env(strtoupper($field));

            if ($result === "") {
                $this->error('Please fill in: ' . $field);
            }
        }
    }
}
