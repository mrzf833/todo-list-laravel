<?php

namespace App\Http\Controllers\Api;

use App\Models\Todo;
use App\Services\TodoService;
use App\Events\MessageProcessed;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTodoRequest;

class TodoListController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return response()->json([
            'data' => $todos
        ]);
    }

    public function store(StoreTodoRequest $request, TodoService $todoService)
    {
        $data = $todoService->create($request->all());
        $message = 'data created successfully';

        event(new MessageProcessed($data, $message));
        return response()->json([
            'message' => $message,
            'data' => $data
        ]);
    }
}
