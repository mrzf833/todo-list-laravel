<?php

namespace App\Notifications;

use App\Models\Todo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TodoCreatedNotification extends Notification
{
    use Queueable;

    public Todo $todo;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'todo_id' => $this->todo->id,
            'name' => $this->todo->name,
            'data' => $this->todo->data
        ];
    }
}
