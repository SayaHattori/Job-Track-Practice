<?php

// 画面から送信されたタスクの入力内容を検証するクラス
namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    // リクエストを許可するか判定
    public function authorize(): bool
    {
        return true;
    }

    // 入力内容の検証ルール
    public function rules(): array
    {
        return [
            // タスク名：必須、文字列、20文字以内
            'tasks' => ['required', 'string', 'max:20'],

            // 期限：任意、年月日と時刻
            'tasks-calendar' => ['nullable', 'date_format:Y-m-d\TH:i'],

            // メモ：任意、文字列、255文字以内
            'tasks-memo' => ['nullable', 'string', 'max:255'],
        ];
    }

    // 入力エラー時のメッセージ
    public function messages(): array
    {
        return [
            'tasks.required' => 'タスクは必須です。',
            'tasks.string' => 'タスクは文字列で入力してください。',
            'tasks.max' => 'タスクは20文字以内で入力してください。',

            'tasks-calendar.date_format' => '正しい日時を入力してください。',

            'tasks-memo.string' => 'メモは文字列で入力してください。',
            'tasks-memo.max' => 'メモは255文字以内で入力してください。',
        ];
    }

    // タスク名を取得
    public function tasks(): string
    {
        return $this->input('tasks');
    }

    // 期限日時を取得
    public function calendar(): ?string
    {
        return $this->input('tasks-calendar');
    }

    // メモを取得
    public function memo(): ?string
    {
        return $this->input('tasks-memo');
    }
}
