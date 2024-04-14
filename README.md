# お問い合わせフォーム

## 環境構築
- Dockerビルド
  1. git clone git@github.com:MiyokoNakada/20240408_enquiry-form.git
  2. docker-compose up -d --build
     
  ※MySQLはOSによって起動しない場合があるので、それぞれのPCに合わせてdocker-compose.ymlファイルを編集してください。
     
- Laravel環境構築
  1. docker-compose exec php bash
  2. composer install
  3. .env.exampleファイルから.envを作成し、環境変数を変更
  4. php artisan key:generate
  5. php artisan migrate
  6. php artisan db:seed

## 使用技術(実行環境)
- PHP 7.4.9
- Laravel Framework 8.83.8
- MySQL 8.0.26

## ER図
![ER_tables](https://github.com/MiyokoNakada/20240408_enquiry-form/assets/159742835/da75b2e2-0814-43d2-950e-ba84a6c4f334)

## URL
- お問い合わせフォーム：http://localhost/
- 管理者画面：http://localhost/admin
- phpMyAdmin：http://localhost:8080
