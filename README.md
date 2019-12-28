#Laravel 6 skeleton


## Setup

### .env file

Copy .env.example to .env

- APP_DEFAULT_LOCALE='nl' ==> Default locale for the website (fallback if locale not given)
- APP_LOCALES = 'nl,en' ==> Available locales, example: 'nl,fr,de,en,es,it'
- MAIL_DEFAULT_FROM='from@host.com' ==> default from email address

## Whats in the skeleton
* Easy to use mailer (app/Max/Mailer)
* Easy to use slack message sender (app/Max/Slack)
* Easy language switcher
* Pusher
* Webpack live sync
* Spatie cookie consent