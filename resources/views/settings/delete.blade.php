<x-app-layout>
    <h1>退会手続き</h1>

    <p>本当に退会しますか？</p>
    <p>退会するとアカウントが削除されます。</p>

    <form method="POST" action="{{ route('profile.destroy') }}">
        @csrf
        @method('DELETE')

        <div>
            <label for="password">パスワード</label>

            <input
                type="password"
                id="password"
                name="password"
                required
            >

            @error('password')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">
            退会する
        </button>
    </form>

    <a href="{{ route('settings.setting') }}">
        設定画面に戻る
    </a>
</x-app-layout>
