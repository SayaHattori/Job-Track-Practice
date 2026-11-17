<x-app-layout>
<h1>やること編集</h1>
{{-- 更新する前のタスクID渡す --}}
<form action="{{ route('tasks.update',['task' => $task->id]) }}" method="POST">
    <div class="task-form">
        {{-- 情報を送信するためのエリア --}}
        @csrf
        @method('PATCH')
        <p>タスク名</p>
        <textarea id="tasks-content" name="tasks">{{ old('tasks', $task->content) }}</textarea>
        @error('tasks')
            <div class="error"><span>{{ $message }}</span></div>
        @enderror<br>

        <p>期限</p>
        <input id="tasks-calendar" type="datetime-local" name="tasks-calendar"><br>
        @error('tasks-calendar')
            <div class="error"><span>{{ $message }}</span></div>
        @enderror<br>

        <p>メモ</p>
        <textarea id="tasks-memo" name="tasks-memo">{{ old('tasks-memo', $task->memo) }}</textarea><br><br>
        @error('tasks-memo')
            <div class="error"><span>{{ $message }}</span></div>
        @enderror<br>

        <button type="submit">更新する</button>
        <a href="{{ route('tasks.index') }}">
        戻る
        </a>
    </div>
</form>
</x-app-layout>
