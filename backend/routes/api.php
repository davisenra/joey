<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Label\LabelController;
use App\Http\Controllers\Message\MessageController;
use App\Http\Controllers\Ticket\TicketController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(TicketController::class)->group(function () {
        Route::get('/tickets', 'index');
        Route::get('/tickets/{ticket:uuid}', 'show');
        Route::post('/tickets', 'store');
        Route::put('/tickets/{ticket:uuid}', 'update');
        Route::patch('/tickets/{ticket:uuid}/assign', 'assignAgent');
        Route::patch('/tickets/{ticket:uuid}/lock', 'lockTicket');
        Route::delete('/tickets/{ticket:uuid}', 'destroy');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/me', 'me');
        Route::get('/users', 'index');
        Route::get('/users/{user:uuid}/{tickets?}', 'show');
    });

    Route::controller(MessageController::class)->group(function () {
        Route::get('/messages/{ticket:uuid}', 'index');
        Route::post('/messages/{ticket:uuid}', 'store');
        Route::delete('/messages/{message}', 'destroy');
    });

    Route::apiResources([
        'categories' => CategoryController::class,
        'labels' => LabelController::class,
    ]);
});
