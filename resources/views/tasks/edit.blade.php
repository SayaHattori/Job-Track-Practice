<x-app-layout>
    <div class="tasks-page">
        <h1 class="tasks-title">やること編集</h1>

        <form action="{{ route('tasks.update', ['task' => $task->id]) }}"
              method="POST"
              class="task-form">
            @csrf
            @method('PATCH')

            <div class="task-field">
                <label for="tasks-content">タスク名</label>

                <textarea
                    id="tasks-content"
                    name="tasks"
                    class="task-input"
                    rows="2"
                >{{ old('tasks', $task->content) }}</textarea>

                @error('tasks')
                    <p class="task-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="task-field">
                <label for="tasks-calendar">期限</label>

                <input
                    id="tasks-calendar"
                    type="datetime-local"
                    name="tasks-calendar"
                    class="task-input"
                    value="{{ old('tasks-calendar', $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d\TH:i') : '') }}"
                >

                @error('tasks-calendar')
                    <p class="task-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="task-field">
                <label for="tasks-memo">メモ</label>

                <textarea
                    id="tasks-memo"
                    name="tasks-memo"
                    class="task-input"
                    rows="5"
                >{{ old('tasks-memo', $task->memo) }}</textarea>

                @error('tasks-memo')
                    <p class="task-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="task-form-actions">
                <button type="submit" class="btn">更新する</button>

                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                    戻る
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
