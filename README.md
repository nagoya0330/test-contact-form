お問い合わせフォーム

環境構築
　Dockerビルド
 1.git clone git@github.com:coachtech-material/laravel-docker-template.git
 2.docker-compose up -d --build

 Lavel環境構築
 1.docker-compose exec php bash
 2.composer install
 3..env.exampleファイルから.envファイルを作成し、環境変数を変更
 4.php artisan key:generate
 5.php artisan migrate
 6.php artisan db:seed

 使用技術
 言語：PHP ^7.3 / ^8.0
 フレームワーク：Laravel 8.75 以上
 認証：Laravel Fortify 1.19 以上
 mysql 8.0.26

URL
## 開発環境
登録画面：http //localhost/register
ログイン画面：http //localhost/login
管理画面：http //localhost/admin
お問い合わせ入力画面：http //localhost/contact
お問合せ内容確認画面：http //localhost/confirm
サンクスページ：http //localhost/thanks

phpMyAdmin：http://localhost:8080/

ER図
<img width="677" alt="ER図" src="https://github.com/user-attachments/assets/431c17c4-a96e-4f33-af6c-6f0991255ddf" />



