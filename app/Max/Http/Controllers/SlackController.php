<?php


namespace App\Max\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Max\Slack\MaxSlack;
use Symfony\Component\HttpFoundation\Request;

class SlackController extends Controller
{
    /** @var MaxSlack */
    protected $slack;

    public function __construct(Request $request, MaxSlack $maxSlack)
    {
        $this->slack = $maxSlack;
        parent::__construct($request);
    }
}