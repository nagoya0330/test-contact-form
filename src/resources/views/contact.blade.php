<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">FashionablyLate</a>
        </div>
    </header>

    <main class="main">
        <h1 class="main-title">Contact</h1>

        <form action="{{ route('contact.confirm') }}" method="POST" class="contact-form">
            @csrf
            <div class="form-group">
    <label>お名前<span class="required">※</span></label>
    <div class="form-control-wrapper name-inputs">
        <div class="input-with-error">
            <input type="text" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}">
            @error('last_name')<p class="error-message">{{ $message }}</p>@enderror
        </div>
        <div class="input-with-error">
            <input type="text" name="first_name" placeholder="例：太郎" value="{{ old('first_name') }}">
            @error('first_name')<p class="error-message">{{ $message }}</p>@enderror
        </div>
    </div>
</div>
            <div class="form-group gender-group">
                <label>性別<span class="required">※</span></label>
                <div class="form-control-wrapper">
                    <div class="gender-inputs">
                        <label><input type="radio" name="gender" value="0" {{ old('gender', '0') == '0' ? 'checked' : '' }}> 男性</label>
                        <label><input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }}> 女性</label>
                        <label><input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}> その他</label>
                    </div>
                    @error('gender')<p class="error-message">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="form-group">
                <label>メールアドレス<span class="required">※</span></label>
                <div class="form-control-wrapper">
                    <input type="email" name="email" placeholder="例：test@example.com" value="{{ old('email') }}">
                    @error('email')<p class="error-message">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="form-group">
    <label>電話番号<span class="required">※</span></label>
    <div class="form-control-wrapper">
        <div class="tel-inputs">
            <div class="input-with-error">
                <input type="text" name="tel1" placeholder="080" value="{{ old('tel1') }}">
                @error('tel1')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-with-error">
                <input type="text" name="tel2" placeholder="1234" value="{{ old('tel2') }}">
                @error('tel2')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-with-error">
                <input type="text" name="tel3" placeholder="5678" value="{{ old('tel3') }}">
                @error('tel3')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
</div>

            <div class="form-group">
                <label>住所<span class="required">※</span></label>
                <div class="form-control-wrapper">
                    <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                    @error('address')<p class="error-message">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="form-group">
                <label>建物名</label>
                <div class="form-control-wrapper">
                    <input type="text" name="building" placeholder="例：千駄ヶ谷マンション101" value="{{ old('building') }}">
                </div>
            </div>

            <div class="form-group">
                <label>お問い合わせの種類<span class="required">※</span></label>
                <div class="form-control-wrapper">
                    <select name="category_id">
                        <option value="">選択してください</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->content }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')<p class="error-message">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="form-group">
                <label>お問い合わせ内容<span class="required">※</span></label>
                <div class="form-control-wrapper">
                    <textarea name="detail" rows="4" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                    @error('detail')<p class="error-message">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="form-submit">
                <button type="submit">確認画面</button>
            </div>
        </form>
    </main>
</body>
</html>
