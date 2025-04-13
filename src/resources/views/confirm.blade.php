<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせ確認</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">FashionablyLate</a>
        </div>
    </header>

    <main class="main">
        <h1 class="main-title">Confirm</h1>

        <form action="{{ route('contact.send') }}" method="POST" class="confirm-form">
            @csrf
            <div class="confirm-row">
                <div class="confirm-label">お名前</div>
                <div class="confirm-value">{{ $inputs['last_name'] }} {{ $inputs['first_name'] }}</div>
            </div>

            <input type="hidden" name="last_name" value="{{ $inputs['last_name'] }}">
            <input type="hidden" name="first_name" value="{{ $inputs['first_name'] }}">

            <div class="confirm-row">
                <div class="confirm-label">性別</div>
                <div class="confirm-value">
                    @php
                        $genders = ['男性', '女性', 'その他'];
                    @endphp
                    {{ $genders[$inputs['gender']] ?? '未選択' }}
                </div>
            </div>

            <input type="hidden" name="gender" value="{{ $inputs['gender'] }}">

            <div class="confirm-row">
                <div class="confirm-label">メールアドレス</div>
                <div class="confirm-value">{{ $inputs['email'] }}</div>
            </div>

            <input type="hidden" name="email" value="{{ $inputs['email'] }}">

            <div class="confirm-row">
                <div class="confirm-label">電話番号</div>
                <div class="confirm-value">{{ $inputs['tel1'] }}-{{ $inputs['tel2'] }}-{{ $inputs['tel3'] }}</div>
            </div>

            <input type="hidden" name="tel1" value="{{ $inputs['tel1'] ?? '' }}">
            <input type="hidden" name="tel2" value="{{ $inputs['tel2'] ?? '' }}">
            <input type="hidden" name="tel3" value="{{ $inputs['tel3'] ?? '' }}">

            <div class="confirm-row">
                <div class="confirm-label">住所</div>
                <div class="confirm-value">{{ $inputs['address'] }}</div>
            </div>

            <input type="hidden" name="address" value="{{ $inputs['address'] }}">

            <div class="confirm-row">
            <div class="confirm-label">建物名</div>
            <div class="confirm-value">{{ $inputs['building'] ?? '' }}</div>
            </div>

            <input type="hidden" name="building" value="{{ $inputs['building'] }}">

            <div class="confirm-row">
                <div class="confirm-label">お問い合わせの種類</div>
                <div class="confirm-value">{{ $categoryName }}</div>
            </div>

            <input type="hidden" name="category_id" value="{{ $inputs['category_id'] }}">

            <div class="confirm-row">
                <div class="confirm-label">お問い合わせ内容</div>
                <div class="confirm-value">{{ $inputs['detail'] }}</div>
            </div>

            <input type="hidden" name="detail" value="{{ $inputs['detail'] }}">

            <div class="form-submit">
                <button type="submit" name="action" value="submit" class="btn-submit">送信</button>
                <button type="submit" name="action" value="back" class="btn-back">修正</button>
            </div>
        </form>
    </main>
</body>
</html>
