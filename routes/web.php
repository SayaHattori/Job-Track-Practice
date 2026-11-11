<?php
//どのURLにアクセスしたら、どのコントローラのどのメソッドを呼ぶかを書くこと
//それ以外の処理はコントローラに書くこと。ここでは、ルーティングの設定だけを行うこと。
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/tasks', 'App\\Http\\Controllers\\TaskController@index')->name('tasks.index');
    Route::get('/tasks/create', 'App\\Http\\Controllers\\TaskController@create')->name('tasks.create');
    Route::post('/tasks', 'App\\Http\\Controllers\\TaskController@store')->name('tasks.store');
});

require __DIR__.'/auth.php';
