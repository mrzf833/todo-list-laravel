<?php

namespace App\Listeners;

use App\Events\TodoProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendTodoNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\TodoProcessed  $event
     * @return void
     */
    public function handle(TodoProcessed $event)
    {
        //
    }
}
