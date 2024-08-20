<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('blog');
});
Route::get('/blog',\App\Livewire\Blog::class)->name('blog');
Route::get('/blog/{id}',\App\Livewire\BlogContent::class)->name('blog-content');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
