<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Session;

class SendAnnouncement extends Mailable
{
    use Queueable, SerializesModels;

    public $msg,$landlord,$sub,$landlordEmail;
    public $id,$to;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($text,$sub)
    {
       
        if(Session::has('LoggedUser')){
            $user = Session::get('LoggedUser');
        }else if(Session::has('LoggedUserGmail')){
            $user = Session::get('LoggedUserGmail');
        }else{
            return redirect('/')->withCookie(Cookie::forget('userType'));
        }
        
        // dd($text);
        $this->msg = $text;
        $this->sub = $sub;
        $this->landlord = $user->getOriginal('name');
        $this->landlordEmail = $user->getOriginal('email');
        // $id = $_COOKIE['id'];
        // $this->to = "Demo@gmail.com";
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        if(Session::has('LoggedUser')){
            $user = Session::get('LoggedUser');
        }else if(Session::has('LoggedUserGmail')){
            $user = Session::get('LoggedUserGmail');
        }else{
            return redirect('/')->withCookie(Cookie::forget('userType'));
        }
        return new Envelope(
            subject: 'Message from your landlord ' ." ". $user->getOriginal('name'),
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        // return new Content( markdown: 'Mail.announcement', );
        return new Content( view: 'Mail.demoMail', );
    }
    
    
    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
