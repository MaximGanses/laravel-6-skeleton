<?php


namespace App\Max\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Max\Mailer\MaxMailer;
use App\Max\Slack\MaxSlack;
use Symfony\Component\HttpFoundation\Request;

class MaxCombinedController extends Controller
{
    /** @var MaxSlack */
    protected $slack;

    /** @var MaxMailer */
    protected $mail;

    public function __construct(Request $request, MaxSlack $maxSlack, MaxMailer $mailer)
    {
        $this->slack = $maxSlack;
        $this->mail = $mailer;
        parent::__construct($request);
    }
}