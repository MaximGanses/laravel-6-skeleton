<?php


namespace App\Max\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Max\Mailer\MaxMailer;
use Symfony\Component\HttpFoundation\Request;

class MailController extends Controller
{
    /** @var MaxMailer */
    public $mail;

    public function __construct(Request $request, MaxMailer $mailer)
    {
        $this->mail = $mailer;
        parent::__construct($request);
    }
}