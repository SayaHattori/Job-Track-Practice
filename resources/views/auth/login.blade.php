<x-guest-layout>
    <div class="login-page">
        <h1 class="tasks-title">ログイン</h1>
        <p class="login-description">
            登録したメールアドレスとパスワードを入力してください。
        </p>

        <x-auth-session-status :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="task-field">
                <label for="email">メールアドレス</label>

                <input
                    id="email"
                    class="task-input"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                >

                <x-input-error
                    :messages="$errors->get('email')"
                    class="mt-2"
                />
            </div>

            <div class="task-field">
                <label for="password">パスワード</label>

                <input
                    id="password"
                    class="task-input"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                >

                <x-input-error
                    :messages="$errors->get('password')"
                    class="mt-2"
                />
            </div>

            <label for="remember_me" class="login-remember">
                <input id="remember_me" type="checkbox" name="remember">
                <span>ログイン状態を保持する</span>
            </label>

            <button type="submit" class="btn login-submit">
                ログイン
            </button>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="login-forgot">
                    パスワードを忘れた方はこちら
                </a>
            @endif
        </form>
    </div>
</x-guest-layout>
