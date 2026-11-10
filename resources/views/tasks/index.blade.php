<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>やること新規登録</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <h1>やること新規登録</h1>
        <div class="task-form">
            <p>タスク名</p>
            <form action="{{ route('tasks.create') }}" method="POST">
                    {{-- データの送信先の指定と送信するHTTPメソッドの指定 --}}
                    @csrf
                    <textarea id="tasks-content" type="text" name="tasks"></textarea>
                    {{-- URLのパラメータとして送信されるデータの名前を指定 --}}
                <p>期限</p>
                <form action="{{ route('tasks.calendar') }}" method="POST">
                    {{-- https://b-risk.jp/blog/2019/09/input-date-form/ を参考に作成 --}}
                    @csrf
                    <input id="tasks-calendar" type="datetime-local" name="task-calendar">
                <p>メモ</p>
                <form action="{{ route('tasks.memo') }}" method="POST">
                    @csrf
                    <textarea id="tasks-memo" type="text" name="tasks-memo"></textarea><br>
                {{-- エラーメッセージをここに表示 --}}
                <p><button type="submit">登録</button></p>
            </form>
        </div>
    </body>
</html>
