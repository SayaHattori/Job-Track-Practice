<?php
//どのURLにアクセスしたら、どのコントローラのどのメソッドを呼ぶかを書くこと
//それ以外の処理はコントローラに書くこと。ここでは、ルーティングの設定だけを行うこと。
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\TaskController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/home', [TopController::class, 'top'])->name('top');
    Route::get('/tabindex/{tabindex}',  [TaskController::class, 'index'])
    ->where('tabindex', '[1-4]')->name('numberStatus');
    Route::patch('/tasks/{task}/status', [TaskController::class, 'updateStatus'])
    ->name('tasks.updateStatus');
});

require __DIR__.'/auth.php';
