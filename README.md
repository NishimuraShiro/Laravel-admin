# Laravel-admin の導入手順

## インストール

`composer require encore/laravel-admin` <br>
`php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"`

## ファイル編集

config\filesystems.php

```
'disks' => [
    // 省略...
    // 末尾に追加
    'admin' => [
        'driver' => 'local',
        'root' => public_path('uploads'),
        'visibility' => 'public',
        'url' => env('APP_URL') . '/uploads',
    ],
    // ここまで
],
```

## インストール

`php artisan admin:install`

## アクセス

`http://localhost/admin/`

## ログイン

ユーザー ID：admin <br>
パスワード：admin

## 確認

![Laravel-admin導入](https://github.com/kousuke1092/Laravel_Practice_2023/assets/73762800/69ec7359-6adb-4c2d-9fe6-844cf190d2a2)

## ダミーデータの追加
`php artisan db:seed --class=TechnologiesTableSeeder`<br>
`php artisan db:seed --class=FormsTableSeeder`
