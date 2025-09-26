<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/notifications', [NotificationController::class, 'index']);
Route::get('/notifications/send', [NotificationController::class, 'send']);