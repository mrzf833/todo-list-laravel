<?php

namespace App\Services;

use App\Mail\SendEmail;
use Exception;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function sendMail(string $emailTo,string $message): string
    {
        try{
            Mail::to($emailTo)->send(new SendEmail($message));
        }catch(Exception $e){
            throw $e;
        }

        return "send mail successfully";
    }
}