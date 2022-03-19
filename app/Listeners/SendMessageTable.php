<?php

namespace App\Listeners;

use App\Events\MessageProcessed;
use App\Models\Message;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMessageTable
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
     * @param  object  $event
     * @return void
     */
    public function handle(MessageProcessed $event)
    {
        $table = $event->table;
        $dataId = $table->id;
        $message = $event->message;

        Message::create([
            'table' => (new (get_class($table)))->getTable(),
            'data_id' => $dataId,
            'message' => $message
        ]);
    }
}
