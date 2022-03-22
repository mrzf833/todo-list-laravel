<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Mail\SendEmail;
use Exception;
use Illuminate\Support\Facades\Mail;

class EmailService extends Controller
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

    public function sendMailWithQueue(string $emailTo,string $message): string
    {
        try{
            $emailJobs = new SendEmailJob($emailTo, $message);
            $this->dispatch($emailJobs);
        }catch(Exception $e){
            throw $e;
        }

        return "send mail successfully";
    }
}