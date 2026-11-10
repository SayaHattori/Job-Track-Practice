<h1>やること新規登録</h1>

    <div class="task-form">
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <p>タスク名</p>
        <textarea id="tasks-content" name="tasks" required></textarea>

        <p>期限</p>
        <input id="tasks-calendar" type="datetime-local" name="tasks-calendar" required><br>

        <p>メモ</p>
        <textarea id="tasks-memo" name="tasks-memo"></textarea><br>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <button type="submit">登録</button>
    </form>
</div>
