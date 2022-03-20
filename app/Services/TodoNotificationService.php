<?php

namespace App\Services;

use App\Models\Todo;
use App\Models\User;
use App\Notifications\TodoCreatedNotification;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class TodoNotificationService
{
    public function send(Todo $todo)
    {
        try{
            $users = User::whereNotIn('id', [Auth::id()])->get();

            Notification::send($users, new TodoCreatedNotification($todo));
        }catch(Exception $e){
            throw $e;
        }
    }
}