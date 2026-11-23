<x-app-layout>
    <h1>やること新規登録</h1>
<form action="{{ route('tasks.store') }}" method="POST">
    <div class="task-form">
        {{-- 情報を送信するためのエリア --}}
        @csrf
        <p>タスク名</p>
        <textarea id="tasks-content" name="tasks"></textarea>
        @error('tasks')
            <div class="error"><span>{{ $message }}</span></div>
        @enderror<br>

        <p>期限</p>
        <input id="tasks-calendar" type="datetime-local" name="tasks-calendar"><br>
        @error('tasks-calendar')
            <div class="error"><span>{{ $message }}</span></div>
        @enderror<br>

        <p>メモ</p>
        <textarea id="tasks-memo" name="tasks-memo"></textarea><br><br>
        @error('tasks-memo')
            <div class="error"><span>{{ $message }}</span></div>
        @enderror<br>

        <button type="submit">登録</button>
    </div>
</form>
</x-app-layout>
