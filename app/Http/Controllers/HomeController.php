<?php

namespace App\Http\Controllers;


use App\Max\Mailer\Mailer;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function indexAction($locale)
    {
        $this->setLocale($locale);
        return view('welcome');
    }
}
