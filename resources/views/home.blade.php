<h1>ホーム</h1>

    <form action="{{ route('tasks.store') }}" method="POST">

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
            <p class="task-label">完了</p>
        </div>

        <div class="status-box">
            <p class="task-count">{{ $notReady }}件</p>
            <p class="task-label">期限切れ</p>
        </div>

    </div>

<h2>やることリスト</h2>

@if($tasks->isEmpty())
    <p>登録されているタスクはありません。</p>
@else
@foreach ($tasks as $task)
    <div>
        <p>{{ $task->content }}</p>
        <p>期限：{{ $task->due_date }}</p>
        <p>メモ：{{ $task->memo }}</p>
    </div>
@endforeach
@endif
<a href="{{ route('tasks.index') }}" class="btn">やることリスト</a>
<a href="{{ route('tasks.create') }}" class="btn">新規登録</a>



{{-- <h2>スケジュール</h2>
<p>(ここに予定の一部を表示)</p> --}}


{{-- https://www.kamome-susume.com/laratto-top/ を参考にして、ホーム画面を作成 --}}
{{-- @extendsや＠sectionは作成してからつけないと画面真っ白になる --}}
