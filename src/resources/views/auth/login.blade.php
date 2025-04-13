<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
                <a class="header__logo" href="/">
                    FashionablyLate
                </a>
                <nav>
                    <ul class="header-nav">
                    <li class="header-nav__item">
                        <a class="header-nav__link" href="{{ route('register') }}">Register</a>
                    </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
    <div class="login-form__content">
        <div class="login-form__heading">
        <h2>Login</h2>
        </div>
        <form class="form" method="POST" action="{{ route('login.post') }}">
        @csrf
        <div class="form__group">
            <div class="form__group-tittle">
            <span class="form__label--item">メールアドレス</span>
            </div>
            <div class="form__group-content">
            <div class="form__input--text">
                <input type="email" name="email" value="{{ old('email') }}" placeholder="例 test@example.com">
            </div>
            <div class="form__error">
                @if ($errors->has('email'))
                <div class="form__error">{{ $errors->first('email') }}</div>
                @endif
            </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-tittle">
            <span class="form__label--item">パスワード</span>
            </div>
            <div class="form__group-content">
            <div class="form__input--text">
                <input type="password" name="password" placeholder="例 coachtech106"
                />
            </div>
            <div class="form__error">
                @if ($errors->has('password'))
                <div class="form__error">{{ $errors->first('password') }}</div>
                @endif
            </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">ログイン</button>
        </div>
        </form>
    </div>
    </main>
</body>

</html>