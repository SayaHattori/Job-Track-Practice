<?php
////タスクの送信を受け付けるコントローラー
namespace App\Http\Controllers;

use App\Models\Task;

class TopController extends Controller
{
    //ホーム画面
    public function top()
    {
    //最新のタスクを5件取得 登録順の場合はcreate_at,desc
    $tasks = Task::orderBy('due_date', 'desc')->take(5)->get();
    return view('home', compact('tasks'));
    }
}
