<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ChatController;

Route::post('/api/chat', [ChatController::class, 'ask']);

Route::get('/', function () {
    return view('home');
});

Route::get('/resume', function () {
    return view('resume');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/resume', function () {
    return view('resume');
});

// Route untuk Projects dan Preview
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/preview/{id}', [ProjectController::class, 'preview'])->name('project.preview');