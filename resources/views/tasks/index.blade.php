<h1>やること一覧</h1>

<a href="{{ route('tasks.create') }}">タスクを新規登録する</a>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif
