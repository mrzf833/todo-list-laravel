<?php

namespace App\Services;

use App\Events\MessageProcessed;
use App\Models\Todo;
use Exception;

class TodoService
{
    protected Todo $todo;

    public function create(array $data): Todo
    {
        try{
            $this->todo = Todo::create([
                'name' => $data['name'],
                'data' => $data['data'],
            ]);

            return $this->todo;
        }catch(Exception $e){
            throw $e;
        }
    }
}