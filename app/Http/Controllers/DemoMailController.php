<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\DemoMail;
use App\Mail\SendAnnouncement;


class DemoMailController extends Controller
{
    public function sendMail(){
        
        // Mail::to('mayurpatel112e@gmail.com')->send(new DemoMail());
        return redirect()->route('welcome');
    }
}
