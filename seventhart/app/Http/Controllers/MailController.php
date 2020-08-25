<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {
   public function basic_email() {
      $data = array('name'=>"Mike Grabsky");
   
      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('mike@grabsky.com', 'Seventh Art')->subject
            ('Laravel Basic Testing Mail');
         $message->from('mike@grabsky.com','Mike Grabsky');
      });
      echo "Basic Email Sent. Check your inbox.";
   }

   public function html_email($contractId, $cinema, $venue, $films) {
      $user = auth()->user();
      $email = $user->email;;

      $firstName = explode(" ", $user->name)[0];
      $data = array('name'=> $firstName, 'contractId' => $contractId, 'cinema' => $cinema, 'venue' => $venue, 'films' => $films);
      Mail::send('mail', $data, function($message) use ($email){
         $message->to($email, $email)->subject
            ('New contract confirmation');
         $message->from('info@seventh-art.com','Seventh Art');
      });
      //echo "HTML Email Sent. Check your inbox.";
   }

   public function attachment_email() {
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
         $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
         $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }
}
