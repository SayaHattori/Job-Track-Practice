<?php
//タスクの送信を受け付けるコントローラー
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        // タスク一覧をビューに渡す
        $tasks = Task::orderBy('created_at', 'desc')->get(); //taskテーブルからタスクを取得
        return view('tasks.index', compact('tasks'));
        //https://www.reddit.com/r/laravel/comments/o1s94g/using_compact_vs_associative_array/?tl=ja
    }

    public function create()
    {
        return view('tasks.create');
    }


    public function store(Request $request)
    {
    dd($request->all()); //デバッグ用　諸々完成したら消す

    $task = new Task();

    $task->content = $request->input('tasks');
    $task->due_date = $request->input('tasks-calendar');
    $task->memo = $request->input('tasks-memo');

    $task->save();
        // task.calender.memoをまとめて保存する

        // タスク作成後のリダイレクトやレスポンスを返す
        return redirect()->route('tasks.index')->with('success', 'タスクが作成されました。');
    }
}

