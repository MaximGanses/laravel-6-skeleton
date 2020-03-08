brew info redis || brew install redis
brew services stop redis
brew services start redis
php artisan horizon

