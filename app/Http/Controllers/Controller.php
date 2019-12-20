<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Routing\Route;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $availableLocales;
    public $defaultLocale;

    public function __construct(Request $request)
    {
        $this->availableLocales = explode(',', Env::get('APP_LOCALES'));
        $this->defaultLocale = Env::get('APP_DEFAULT_LOCALE', 'en');
        App::setLocale(Env::get('APP_DEFAULT_LOCALE', 'en'));
    }

    public function setLocale($locale)
    {
        if (!in_array($locale, $this->availableLocales)) {
            throw new NotFoundHttpException('The page you are looking for is not found');
        }
        App::setLocale($locale);
    }
}
