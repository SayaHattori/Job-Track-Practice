<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Task\CreateRequest;

class TaskController extends Controller
{
    /**
     * タスク一覧を表示する
     */
    public function index()
    {
        $tasks = []; // Task::all()
        return view('tasks.index', compact('tasks'));
    }

    /**
     * タスクを新規作成して保存する
     */
    public function create(CreateRequest $request)
    {
        $task = $request->input('tasks');
    // TODO: Taskモデルを使ってデータベースに保存する処理をここに記述
     \App\Models\Task::create(['content' => $task]);

        return redirect()->route('tasks.index')->with('success', 'タスクが作成されました。');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
