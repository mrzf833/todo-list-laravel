<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EmailController;
use App\Http\Controllers\Api\TodoListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('/user', [AuthController::class, 'user']);

    Route::group(['prefix' => 'todo', 'middleware' => 'auth:sanctum', 'as' => 'todo.'], function(){
        Route::get('/', [TodoListController::class, 'index'])->name('index');
        Route::get('/cache', [TodoListController::class, 'indexCachce'])->name('indexCachce');
        Route::post('/', [TodoListController::class, 'store'])->name('store');
    });

    Route::post('/email/send', [EmailController::class, 'send'])->name('email.send');
    Route::post('/email/send/queue', [EmailController::class, 'sendWithQueue'])->name('email.send_queue');
});
Route::post('/login', [AuthController::class, 'login']);