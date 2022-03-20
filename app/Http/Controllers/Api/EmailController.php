<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendMailRequest;
use App\Services\EmailService;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function send(SendMailRequest $request, EmailService $emailService)
    {
        $message  = $emailService->sendMail($request->email_to, $request->message);

        return response()->json([
            'message' => $message
        ]);
    }
}
