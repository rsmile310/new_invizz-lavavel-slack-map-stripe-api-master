<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Mail;
use App\Mail\contactEmail;
use App\Mail\sendGrid;

class EmailVerifyController extends Controller
{
    //

    public function ToVerify(){
        $currentUser = \Auth::user();
        $email = $currentUser->email;
        return view('emails.emailVerify', compact('email'));
    }

    public function LeaveFeedback(Request $request){

        $email = $request->email_contact;
        $name = $request->name_contact;
        $subject = $request->subject_contact;
        $message = $request->message_contact;

        $input = ['message' => $message, 'email'=>$email, 'name'=>$name, 'subject'=>$subject];

        Mail::to('info@invizz.io')->send(new contactEmail($input));
        // return view('emails.emailVerify', compact('email'));
        return view('homepage');
    }

    public function RecendMail(Request $request){
        $resend_mail = $request->resend_mail;

        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
        $auth = base64_encode($resend_mail);
        $verify_link = $actual_link."/auth/".$auth;

        $input = ['message' => $verify_link, 'subject' => 'Email Verification'];
    
        Mail::to($resend_mail)->send(new sendGrid($input));
        
        $email = $resend_mail;
        return view('emails.emailVerify', compact('email'));
    }
}
