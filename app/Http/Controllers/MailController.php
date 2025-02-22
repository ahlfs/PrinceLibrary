<?php

namespace App\Http\Controllers;


use App\Models\PersonalMessageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageMail;
use Carbon\Carbon;


class MailController extends Controller
{
    public function send_email(Request $req)
    {
        
        $target = 'ahlulffirdaus@gmail.com';
        $subject = 'BANG AL ADA PESAN BARUU !!!';

        if ($req->name == null) {
            $name = 'anonymous';
        }
        else {
            $name = $req->name;
        }

        if ($req->email == null) {
            $email = 'anonymous@gmail.com';
        }
        else {
            $email = $req->email;
        }

        if ($req->messageku == null) {
            session()->flash('postfailed', 'Message cannot be empty !');
            return redirect()->route('index');
        }
        $messageku = $req->messageku;
        $anonymous = $req->anonymous;
        $message_date = Carbon::now('Asia/Jakarta');
        $message_date_final = $message_date->format('F j, Y');
        $personal_message = new PersonalMessageModel();
        $personal_message->sender_name = $name;
        $personal_message->sender_email = $email;
        $personal_message->sender_message = $messageku;
        $personal_message->send_date = $message_date_final;
        if ($anonymous == 'on') {
            $personal_message->anonymous = true;
        }
        else {
            $personal_message->anonymous = false;
        }
        $personal_message->save();

        if ($anonymous == 'on') {
            $name = 'Anonymous';
            $email = '';
        }

        Mail::to($target)->send(new MessageMail($subject, $name, $email, $messageku, $message_date_final));
        session()->flash('postsuccess', 'Message Sent !');
        return redirect()->back();
    }

   
}
