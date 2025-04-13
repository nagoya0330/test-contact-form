<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
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
                      <a class="header-nav__link" href="{{ route('login') }}">login</a>
                    </li>
                  </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
      @if (session('status'))
        <div class="form__message">
        {{ session('status') }}
        </div>
        @endif
      <div class="register-form__content">
        <div class="register-form__heading">
          <h2>Register</h2>
        </div>
        <form class="form" method="POST" action="{{ route('register.post') }}">
          @csrf
          <div class="form__group">
            <div class="form__group-tittle">
              <span class="form__label--item">お名前</span>
            </div>
            <div class="form__group-content">
              <div class="form__input--text">
                <input type="text" name="name" value="{{ old('name') }}" placeholder="例 山田太郎">
              </div>
              <div class="form__error">
                @if ($errors->has('name'))
                  <div class="form__error">{{ $errors->first('name') }}</div>
                @endif
              </div>
            </div>
          </div>
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
            <button class="form__button-submit" type="submit">登録</button>
          </div>
        </form>
      </div>
    </main>
</body>

</html>