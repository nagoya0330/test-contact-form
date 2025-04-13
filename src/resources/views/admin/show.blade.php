<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ詳細</title>
    <!-- 外部CSSを読み込む -->
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-modal.css') }}"> <!-- 追加されたCSS -->
</head>
<body>
    <!-- モーダルウィンドウ -->
    <div class="modal">
        <div class="modal-content">
            <!-- 閉じるボタン -->
            <label class="close" for="modal-toggle">&times;</label>

            <p><strong>名前:</strong> {{ $contact->first_name }} {{ $contact->last_name }}</p>
            <p><strong>性別:</strong> {{ $contact->gender == 0 ? '男性' : '女性' }}</p>
            <p><strong>メールアドレス:</strong> {{ $contact->email }}</p>
            <p><strong>電話番号:</strong> {{ $contact->tel }}</p>
            <p><strong>住所:</strong> {{ $contact->address }}</p>
            <p><strong>建物名:</strong> {{ $contact->building }}</p>
            <p><strong>お問い合わせの種類:</strong> {{ $contact->category->content }}</p>
            <p><strong>お問い合わせ内容:</strong> {{ $contact->detail }}</p>

            <!-- 削除ボタン -->
            <form action="{{ route('admin.destroy', $contact->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button">削除</button>
            </form>
        </div>
    </div>

    <!-- モーダルを開くためのボタン（ページに表示されるボタン） -->
    <label for="modal-toggle" class="detail-button" style="cursor: pointer;">詳細</label>

    <!-- モーダル表示用チェックボックス（CSSで操作）-->
    <input type="checkbox" id="modal-toggle" style="display: none;" />
</body>
</html>