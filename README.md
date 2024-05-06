# アプリケーション名
FashionablyLate

## 環境構築
Dockerビルド
1.git clone git@github.com:YamaguchiTomoaki/fashionablylate-form.git
2.docker-compose up -d --build
*MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ymlファイルを編集してください

Laravel環境構築
1.docker-compose exec php bash
2.composer install
3..env.exampleファイルから.envを作成し、環境変数を変更
4.php artisan key:generate
5.php artisan migrate
6.php artisan db:seed

## 使用技術(実行環境)
・PHP 7.4.9
・Laravel 8.83.8
・MySQL 8.0.26

## ER図
![スクリーンショット 2024-05-06 175243](https://github.com/YamaguchiTomoaki/fashionablylate-form/assets/163442049/e59c8efe-331f-4c5d-a073-cb4e19aec09b)


## URL
開発環境：http://localhost/
