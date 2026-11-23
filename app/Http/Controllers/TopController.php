<?php
////タスクの送信を受け付けるコントローラー
namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\Task\TaskRequest;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function top(Request $request)
    {
        // 未着手のタスク数
        $Ready = Task::where('status', 1)->count();

        // 着手中のタスク数
        $doing = Task::where('status', 2)->count();

        // 完了したタスク数
        $Done = Task::where('status', 3)->count();

        // 期限切れ（期限を過ぎていて、まだ完了していない）
        $notReady = Task::where('due_date', '<', now())
                        ->whereIn('status', [1, 2])
                        ->count();

        //最新のタスクを5件取得 登録順の場合はcreate_at,desc
    $tasks = Task::whereIn('status', [1, 2])
        ->where('due_date', '>=', now())
        ->orderBy('due_date', 'asc')
        ->take(5)
        ->get();
        // ホーム画面にデータを渡す
        return view('home', compact('Ready','doing','Done','notReady','tasks'
        ));
    }
}
