<?php
//どのURLにアクセスしたら、どのコントローラのどのメソッドを呼ぶかを書くこと
//それ以外の処理はコントローラに書くこと。ここでは、ルーティングの設定だけを行うこと。
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::post('/tasks/calendar', [TaskController::class, 'calendar'])->name('tasks.calendar');
    Route::post('/tasks/memo', [TaskController::class, 'memo'])->name('tasks.memo');
});

require __DIR__.'/auth.php';
