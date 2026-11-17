<x-app-layout>
<h1>やること一覧</h1>

<a href="{{ route('tasks.create') }}">
    タスクを新規登録する
</a>
<a href="{{ route('top') }}">
    ホームに戻る
</a>

{{-- 成功メッセージ --}}
@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

{{-- ステータス切り替える --}}
<nav>
    <a href="{{ route('tasks.index') }}">全て</a>
    <a href="{{ route('tasks.Ready') }}">未着手</a>
    <a href="{{ route('tasks.doing') }}">作業中</a>
    <a href="{{ route('tasks.Done') }}">完了済</a>
    <a href="{{ route('tasks.notReady') }}">期限切れ</a>
</nav>

{{-- ステータス更新 --}}
<form id="status-update-form" action="{{ route('tasks.updateStatus')}}" method="POST">
    @csrf
    @method('PATCH')

        <button type="submit">更新</button>
        </form>


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
            <select name="statuses[{{ $task->id }}]"
                form="status-update-form">
                <option value="1" @selected(old('statuses.'.$task->id, $task->status) === 1)>
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
                    <a href="{{ route('tasks.edit', $task->id) }}">編集</a>

                    {{-- タスク削除 --}}
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit">削除</button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
</table>
</x-app-layout>


