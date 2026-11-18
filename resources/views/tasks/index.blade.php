<x-app-layout>
    <div class="tasks-page">
        <h1 class="tasks-title">やること一覧</h1>

<div class="task-toolbar">
    <a href="{{ route('tasks.create') }}" class="btn">
        タスクを新規登録する
    </a>

    <a href="{{ route('top') }}" class="btn">
        ホームに戻る
    </a>

    <form id="status-update-form"
          action="{{ route('tasks.updateStatus') }}"
          method="POST">
        @csrf
        @method('PATCH')

        <button type="submit" class="btn">更新</button>
    </form>
</div>

{{-- 成功メッセージ --}}
@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

{{-- ステータス切り替える --}}
<nav class="task-tabs">
    <a href="{{ route('tasks.index') }}"
       @class([
           'is-active' => request()->routeIs('tasks.index'),
       ])>
        全て
    </a>

    <a href="{{ route('tasks.Ready') }}"
       @class([
           'is-active' => request()->routeIs('tasks.Ready'),
       ])>
        未着手
    </a>

    <a href="{{ route('tasks.doing') }}"
       @class([
           'is-active' => request()->routeIs('tasks.doing'),
       ])>
        着手中
    </a>

    <a href="{{ route('tasks.Done') }}"
       @class([
           'is-active' => request()->routeIs('tasks.Done'),
       ])>
        完了済
    </a>

    <a href="{{ route('tasks.notReady') }}"
       @class([
           'is-active' => request()->routeIs('tasks.notReady'),
       ])>
        期限切れ
    </a>
</nav>



{{-- タスク一覧 --}}
<table class="task-table">
    <tr>
        <th>タスク名</th>
        <th>期限</th>
        <th>メモ</th>
        <th>ステータス</th>
        <th>操作</th>
    </tr>

    @foreach ( $tasks as $task )

        <tr>
            <td>{{ $task->content }}</td>
            <td>{{ $task->due_date }}</td>
            <td>{{ $task->memo }}</td>


                {{-- @if ($task->status == 1)
                    未着手
                @elseif ($task->status == 2)
                    着手中
                @elseif ($task->status == 3)
                    完了
                @endif --}}

            <td>
            <select class="task-status-select"
                name="statuses[{{ $task->id }}]"
                form="status-update-form">
                <option value="1" @selected(old('statuses.'.$task->id, $task->status) == 1)>
                    未着手
                </option>
                <option value="2"
                    @selected(old('statuses.'.$task->id, $task->status) == 2)>
                    着手中
                </option>
                <option value="3"
                    @selected(old('statuses.'.$task->id, $task->status) == 3)>
                    完了
                </option>
            </select>
            </td>

            <td>
            <div class="task-actions">

                    {{-- 編集画面へ --}}
                    <a href="{{ route('tasks.edit', $task->id) }}" class="task-edit">編集</a>

                    {{-- タスク削除 --}}
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="task-delete">削除</button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
</table>
</div>
</x-app-layout>


