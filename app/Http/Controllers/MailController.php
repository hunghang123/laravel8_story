<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public function send_mail(){
        //send mail
        $to_name = "Story store 2";
        $to_email = "tenshihikari6@gmail.com";//send to this email

        $data = array("name"=>"mail từ Story store 2","body"=>'Gửi về hàng hóa'); //body of mail.blade.php
    
        Mail::send('page_user.mail.sendmail',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('test mail nhé');//send this mail with subject
            $message->from($to_email,$to_name);//send from this mail
        });
        //--send mail
        return redirect('/')->with('message','');

    }


}
