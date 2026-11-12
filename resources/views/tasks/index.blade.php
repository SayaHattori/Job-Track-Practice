<h1>やること一覧</h1>

<a href="{{ route('tasks.create') }}">
    タスクを新規登録する
</a>

{{-- 成功メッセージ --}}
@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

{{-- タスク一覧 --}}
<table>
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
                @if ($task->status == 2)
                    着手中
                @elseif ($task->status == 3)
                    完了
                @else
                    未着手
                @endif
            </td>

            <td>
                {{-- アップデートした後の処理 --}}
                <form action="{{ route('tasks.updateStatus', $task->id) }}"
                      method="POST">

                    @csrf
                    {{-- 既存のデータの更新 --}}
                    @method('PATCH')

                    <select name="status">
                        <option value="1" @selected($task->status == 1)>
                            未着手
                        </option>
                        <option value="2" @selected($task->status == 2)>
                            着手中
                        </option>
                        <option value="3" @selected($task->status == 3)>
                            完了
                        </option>
                    </select>
                    <button type="submit">更新</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
