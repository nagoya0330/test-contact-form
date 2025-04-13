<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin-modal.css') }}" />
</head>
<body>
<header class="header">
    <div class="header__inner">
        <div class="header-utilities">
            <a class="header__logo" href="/">FashionablyLate</a>
            <nav>
                <ul class="header-nav">
                    <li class="header-nav__item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="header-nav__link logout-button">logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<main class="admin-main">
    <h1 class="main-title">Admin</h1>

    <!-- 検索フォーム -->
    <form action="{{ route('admin.search') }}" method="GET" class="search-form">
        <input type="text" name="keyword" placeholder="名前やメールアドレス" class="search-input">
        <select name="gender" class="search-select">
            <option value="">性別</option>
            <option value="全て">全て</option>
            <option value="男性">男性</option>
            <option value="女性">女性</option>
            <option value="その他">その他</option>
        </select>
        <select name="contact_type" class="search-select">
            <option value="">お問い合わせ種類</option>
            <option value="質問">質問</option>
            <option value="意見">意見</option>
            <option value="その他">その他</option>
        </select>
        <input type="date" name="date" class="search-date">
        <button type="submit" class="search-button">検索</button>
        <a href="{{ route('admin.index') }}" class="reset-button">リセット</a>
    </form>

    <div class="export-pagination">
        <div class="action-bar">
            <form action="{{ route('admin.export') }}" method="GET" class="export-form">
                <button type="submit" class="export-button">エクスポート</button>
            </form>
            <div class="pagination-container">
                {!! $contacts->links('vendor.pagination.custom') !!}
            </div>
        </div>
    </div>

    <!-- データ一覧 -->
    <table class="data-table">
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                <td>{{ $contact->gender == 0 ? '男性' : '女性' }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->content }}</td>
                <td>
                    <!-- 詳細ボタン -->
                    <label for="modal-toggle-{{ $contact->id }}" class="detail-button">詳細</label>
                    <input type="checkbox" id="modal-toggle-{{ $contact->id }}" class="modal-toggle" hidden>

                    <!-- モーダル本体 -->
                    <div class="modal">
                        <div class="modal-content">
                            <!-- 閉じる -->
                            <label for="modal-toggle-{{ $contact->id }}" class="close">&times;</label>

                            <div class="modal-detail-row">
                                <div class="modal-detail-label">名前:</div>
                                <div class="modal-detail-value">{{ $contact->last_name }} {{ $contact->first_name }}</div>
                            </div>
                            <div class="modal-detail-row">
                                <div class="modal-detail-label">性別:</div>
                                <div class="modal-detail-value">{{ $contact->gender == 0 ? '男性' : '女性' }}</div>
                            </div>
                            <div class="modal-detail-row">
                                <div class="modal-detail-label">メールアドレス:</div>
                                <div class="modal-detail-value">{{ $contact->email }}</div>
                            </div>
                            <div class="modal-detail-row">
                                <div class="modal-detail-label">電話番号:</div>
                                <div class="modal-detail-value">{{ $contact->tel }}</div>
                            </div>
                            <div class="modal-detail-row">
                                <div class="modal-detail-label">住所:</div>
                                <div class="modal-detail-value">{{ $contact->address }}</div>
                            </div>
                            <div class="modal-detail-row">
                                <div class="modal-detail-label">建物名:</div>
                                <div class="modal-detail-value">{{ $contact->building }}</div>
                            </div>
                            <div class="modal-detail-row">
                                <div class="modal-detail-label">お問い合わせの種類:</div>
                                <div class="modal-detail-value">{{ $contact->category->content }}</div>
                            </div>
                            <div class="modal-detail-row">
                                <div class="modal-detail-label">お問い合わせ内容:</div>
                                <div class="modal-detail-value">{{ $contact->detail }}</div>
                            </div>

                            <form action="{{ route('admin.destroy', $contact->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button">削除</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>
</body>
</html>
