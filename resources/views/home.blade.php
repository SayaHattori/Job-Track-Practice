<x-app-layout>
    <div class="tasks-page home-page">
        <h1 class="tasks-title">ホーム</h1>

        <div class="task-status">
            <div class="status-box">
                <p class="task-count">{{ $Ready }}件</p>
                <p class="task-label">未着手</p>
            </div>

            <div class="status-box">
                <p class="task-count">{{ $doing }}件</p>
                <p class="task-label">着手中</p>
            </div>

            <div class="status-box">
                <p class="task-count">{{ $Done }}件</p>
                <p class="task-label">完了済</p>
            </div>

            <div class="status-box">
                <p class="task-count">{{ $notReady }}件</p>
                <p class="task-label">期限切れ</p>
            </div>
        </div>

        <div class="task-toolbar">
            <h2>やることリスト</h2>

            <a href="{{ route('tasks.index') }}" class="btn">
                一覧を見る
            </a>

            <a href="{{ route('tasks.create') }}" class="btn">
                新規登録
            </a>
        </div>

        @if ($tasks->isEmpty())
            <p>登録されているタスクはありません。</p>
        @else
<table class="task-table">
    <tr>
        <th>タスク名</th>
        <th>期限</th>
        <th>メモ</th>
    </tr>

    @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->content }}</td>
            <td>{{ $task->due_date }}</td>
            <td>{{ $task->memo }}</td>
        </tr>
    @endforeach
</table>
        @endif
    </div>
</x-app-layout>



{{-- <h2>スケジュール</h2>
<p>(ここに予定の一部を表示)</p> --}}


{{-- https://www.kamome-susume.com/laratto-top/ を参考にして、ホーム画面を作成 --}}
{{-- @extendsや＠sectionは作成してからつけないと画面真っ白になる --}}
