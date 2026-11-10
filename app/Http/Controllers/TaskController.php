<?php
//タスクの送信を受け付けるコントローラー
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\TaskRequest;
use Illuminate\Support\Facades\Log;  // ログを使用するためのインポート
use Illuminate\Http\Request;
use App\Models\Task;

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
        return view('tasks.index');
    }


    public function store(TaskRequest $request)
    {
        $tasks = new Task();
        $tasks->content = $request->input('tasks');
        $tasks->save();
        $calender = new Calendar();
        $calender->date = $request->input('tasks-calendar');
        $calender->save();
        $memo = new Memo();
        $memo->content = $request->input('tasks-memo');
        $memo->save();
        // バリデーション済みのデータを使用してタスクを作成する処理をここに追加

        // タスク作成後のリダイレクトやレスポンスを返す
        return redirect()->route('tasks.index')->with('success', 'タスクが作成されました。');
    }
}

