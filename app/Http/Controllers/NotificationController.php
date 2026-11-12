<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\WelcomeStudent;
use App\Services\TelegramService;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    public function __construct(
        protected TelegramService $telegramService
    ) {}
    //
    public function sendMail(Request $request){

        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        // Mail::to($email)->queue(new WelcomeStudent($name));
        $this->telegramService->send($message   );
        // Mail::to($email)->send(new WelcomeStudent($name));
        return response()->json([
            "message" => "Mail Sent!"
        ]);
    }
}
