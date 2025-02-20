<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
use Illuminate\Support\Facades\Route;

// Membuat route untuk halaman utama (home), yang akan memanggil metode 'index' dari TaskController
Route::get('/', [TaskController::class, 'index'])->name('home');

// Membuat resource route untuk TaskListController
// Route ini secara otomatis akan membuat semua metode CRUD (index, create, store, show, edit, update, destroy)
Route::resource('lists', TaskListController::class);

// Membuat resource route untuk TaskController
// Sama seperti sebelumnya, ini akan membuat route untuk operasi CRUD pada tasks
Route::resource('tasks', TaskController::class);

// Route khusus untuk menandai sebuah tugas sebagai selesai
// Menggunakan metode PATCH karena hanya memperbarui sebagian dari data tugas
Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');

// Route untuk memindahkan tugas ke daftar (list) lain
// Menggunakan metode PATCH karena hanya mengubah atribut tertentu dalam tugas
Route::patch('/tasks/{task}/change-list', [TaskController::class, 'changeList'])->name('tasks.changeList');

// Route untuk halaman "About", yang akan memanggil metode 'about' di TaskController
Route::get('/about', [TaskController::class, 'about'])->name('about');
