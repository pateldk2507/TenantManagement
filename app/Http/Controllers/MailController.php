<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendAnnouncement;
use App\Models\Announcement;
use App\Models\Tenant;
use App\Models\MailStatus;
use Session;
use Http;


class MailController extends Controller
{
        public function sendMail(Request $request){

            if (Session::has('LoggedUserGmail')) {
                $reg = Session::get('LoggedUserGmail')->getOriginal('id');
             }elseif(Session::has('LoggedUser')){
                 $reg = Session::get('LoggedUser')->getOriginal('id');
             }else{
                 return redirect('/')->withCookie(Cookie::forget('userType'));
             }

            $a = new Announcement([
                'msg' => $request->get('announceText'),
                'subject' =>$request->get('subject'),
                'landlordID' => $reg,
                'msgType' => $request->get('announceType'),
                'to' => implode('|', $request->get('sendTo')),
            ]);
            $a->save();
            $ans = Tenant::select('email')->whereIn('property', $request->get('sendTo'))->get()->unique('email');

            foreach ($ans as $a) {
                $mail = new Mailstatus(['mail'=> $a->getOriginal('email')]);
                
                $sendToOnlineData = Http::asForm()->post('https://customersdemands.000webhostapp.com/insertMail.php', [
                    'mail' => $a->getOriginal('email')
                ]);

                $mail->save();

                $email = $a->getOriginal('email');
                $sub = $request->get('subject');
                $text = $request->get('announceText');

                Mail::to($email)->send(new SendAnnouncement($text,$sub));
                
            }

            return back()->with('success','Announcement Sent');     
        }


        public function viewAnnouncement(Request $request){
            $msg = $request->get('msg');
            $data = compact('msg');
            return view('landlord.view_announcement')->with($data);
        }

        public function mailstatus(Request $request){
            $mail = Mailstatus::find($request->get('id'));
            $mail->status = 1;
            $mail->save();
        }
}
