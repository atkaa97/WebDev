<?php

namespace App\Http\Controllers;

use App\Mail\SupportMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BlockedController extends Controller
{
    public function index()
    {
        return view('blocked.blocked');
    }

    public function support()
    {
        return view('blocked.support');
    }

    public function sendMail()
    {
        $user = Auth::user();

        Mail::to($user->email)->send(new SupportMail());
        return 'Your message successfully sent.';
//        return redirect(route('blocked'))->with('sendEmail', 'Your message successfully sent.'); TODO
    }
}
