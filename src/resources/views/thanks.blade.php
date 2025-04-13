<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせ完了</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
</head>
<body>
    <div class="thank-you-wrapper">
        <div class="message">お問い合わせありがとうございました</div>
        <a href="{{ route('contact.create') }}" class="home-button">HOME</a>
    </div>
    <div class="background-text">Thank you</div>
</body>
</html>

