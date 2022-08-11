<?php

namespace App\Http\Controllers\Api;

use App\Models\Todo;
use App\Services\TodoService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTodoRequest;
use App\Notifications\TodoCreatedNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class TodoListController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        $notification = Auth::user()->notifications()
            ->where('type', TodoCreatedNotification::class)
            ->whereNull('read_at')->get();

        $notification->markAsRead();

        return response()->json([
            'data' => $todos
        ]);
    }

    public function indexCachce()
    {

        $todos = Cache::remember("todos", now()->addMinutes(60), function(){
            $todos = Todo::all();

            return $todos;
        });

        return response()->json([
            'data' => $todos
        ]);
    }

    public function store(StoreTodoRequest $request, TodoService $todoService)
    {
        $data = $todoService->create($request->all());

        return response()->json([
            'message' => $data['message'],
            'data' => $data['todo']
        ]);
    }
}
