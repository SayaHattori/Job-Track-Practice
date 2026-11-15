<?php
//タスクの送信を受け付けるコントローラー
namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\Task\TaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::orderBy('due_date', 'asc')->get();

        //タスク一覧にビューを返す
        return view('tasks.index', compact('tasks'));
    }
    //ステータス別表示　https://zenn.dev/engineer_yone3/articles/c3d12c99b2caef
    //https://www.reddit.com/r/laravel/comments/o1s94g/using_compact_vs_associative_array/?tl=ja

    //未着手を表示
    public function Ready()
    {
        $tasks = Task::where('status', '1')
             ->orderBy('due_date', 'asc')
             ->get();

            return view('tasks.index', compact('tasks'));
    }

    //着手中を表示
    public function doing()
    {
        $tasks = Task::where('status', '2')
             ->orderBy('due_date', 'asc')
             ->get();

            return view('tasks.index', compact('tasks'));
    }

    //完了済を表示
    public function Done()
    {
        $tasks = Task::where('status', '3')
             ->orderBy('due_date', 'asc')
             ->get();

            return view('tasks.index', compact('tasks'));
    }

    //期限切れを表示
    public function notReady()
    {
        $tasks = Task::where('due_date', '<', now())
             ->orderBy('due_date', 'asc')
             ->get();

            return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        // タスク作成画面を表示する
        return view('tasks.create');
    }

    public function store(TaskRequest $request)
    {
        $task = new task;
        $task->content = $request->input('tasks');
        $task->due_date = $request->input('tasks-calendar');
        $task->memo = $request->input('tasks-memo');
        $task->status = 1; //新しいタスクはデフォルトが１（未着手）
        $task->save();

        // task.calender.memoをまとめて保存する
        // タスク作成後のリダイレクトやレスポンスを返す
        return redirect()->route('tasks.index')->with('success', 'タスクが作成されました。');
    }
    // タスクのステータスを更新する
public function updateStatus(Request $request, Task $task)
{
    // ステータスが1・2・3のいずれかを確認
    $validated = $request->validate([
        'status' => ['required', 'integer', 'in:1,2,3'],
    ]);

    // ステータスを更新
    $task->status = $validated['status'];
    $task->save();

    // タスク一覧に戻る
    return redirect()->route('tasks.index')
        ->with('success', 'ステータスを更新しました。');
}
}
