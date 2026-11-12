<?php
//タスクの送信を受け付けるコントローラー
namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\Task\TaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index($tabindex = null)
    {
        $select = Task::query();
        if ($tabindex !== null) {
            $select->where('status', $tabindex);
        }

        $tasks = $select->orderBy('created_at', 'desc')->get();

        //タスク一覧にビューを返す
        return view('tasks.index', compact('tasks', 'tabindex'));
    }

    //https://www.reddit.com/r/laravel/comments/o1s94g/using_compact_vs_associative_array/?tl=ja

    public function create()
    {
        // タスク作成画面を表示する
        return view('tasks.create');
    }

    public function store(TaskRequest $request)
    {
        $task = new Task();

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
