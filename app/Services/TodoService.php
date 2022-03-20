<?php

namespace App\Services;

use App\Events\MessageProcessed;
use App\Models\Todo;
use Exception;

class TodoService
{
    protected Todo $todo;

    public function create(array $data): array
    {
        try{
            $this->todo = Todo::create([
                'name' => $data['name'],
                'data' => $data['data'],
            ]);
        }catch(Exception $e){
            throw $e;
        }
        $message = 'data created successfully';

        // event(new MessageProcessed($data, $message));
        (new TodoNotificationService)->send($this->todo);

        return [
            'todo' => $this->todo,
            'message' => $message
        ];
    }
}