<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\WelcomeStudent;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    public function sendMail(Request $request){

        $name = $request->input('name');
        $email = $request->input('email');



        Mail::to('$email')->queue(new WelcomeStudent($name));

        //Mail::to('borapicheth23@gmail.com')->send(new WelcomeStudent('Sokha'));



        return response()->json([
            "message" => 'Mail Sent'
        ]            
        );
    }
}
