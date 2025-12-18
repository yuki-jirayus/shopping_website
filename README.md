# ショッピングサイト（PHP + SQL Server）

本リポジトリは、学校の授業内で開発したショッピングサイトです。  
PHP と Microsoft SQL Server を使用した Web アプリケーションで、XAMPP を用いてローカル実行が可能です。

GitHub リポジトリ：[https://github.com/yuki-jirayus/shopping_website](https://github.com/yuki-jirayus/shopping_website)

---

## 1. 環境要件

### OS / 実行環境

- Windows 10 / 11

### Webサーバ・言語

- Apache（XAMPP に含まれる）
- PHP 7.4 以上

### データベース

- Microsoft SQL Server（Express Edition 推奨）
- PHP 用 SQL Server ドライバ（`php_sqlsrv` または `pdo_sqlsrv`）

### ブラウザ

- Google Chrome / Edge / Firefox の最新バージョン

### その他


- XAMPP（Apache + PHP 環境構築用）

---

## 2. 起動手順

### 2-1. ソースコード取得

cd C:\xampp\htdocs
git clone https://github.com/yuki-jirayus/shopping_website.git


### 2-2. フォルダ構成例
```bash

C:\xampp\htdocs\shopping_website\
  ├─ index.php
  ├─ goods.php
  ├─ cart.php
  ├─ buy.php
  ├─ login.php / logout.php
  ├─ signup.php / signupEnd.php
  ├─ header.php / header2.php
  ├─ css/
  ├─ images/
  └─ helpers/
```
### 2-3. データベース準備

1. SQL Server Management Studio でログイン

2. データベース作成（例：jecShopping）

3. 以下のテーブルを作成する:

- goods（商品マスタ）

- goodsgroup（商品カテゴリ）

- users（会員情報）

- orders（注文ヘッダー）

- order_details（注文明細）

### 2-4. DB接続情報の設定

helpers/db_helper.php に以下のように記述：

- define('DB_SERVER', 'localhost\\SQLEXPRESS');  [SQL Server名]

- define('DB_NAME',   'jecShopping');            [データベース名]

- define('DB_USER',   'your_user');              [ユーザ名]

- define('DB_PASS',   'your_password');          [パスワード]

### 2-5. Apache / SQL Server を起動してアクセス

- XAMPP コントロールパネルで Apache を起動

- SQL Server を起動（Windowsサービス確認）

- URLにアクセス：http://localhost/shopping_website/index.php

## 3. 簡単な設計説明
### 3-1. ページ構成と機能
| ファイル名        | 機能概要                  |
| ------------ | --------------------- |
| `index.php`  | トップページ、商品一覧・検索表示      |
| `goods.php`  | 商品詳細ページ、カート追加         |
| `cart.php`   | カート内商品確認、数量変更、購入へ遷移   |
| `buy.php`    | 購入確認・注文データ登録          |
| `login.php`  | ログイン処理（セッション保存）       |
| `signup.php` | 会員登録ページ               |
| `logout.php` | ログアウト処理（セッション削除）      |
| `header.php` | 上部共通メニュー（ログイン状況・メニュー） |


### 3-2. 補助フォルダ

| フォルダ名      | 内容                   |
| ---------- | -------------------- |
| `css/`     | スタイルシート              |
| `images/`  | 商品画像・ロゴなど            |
| `helpers/` | DB アクセス、共通関数（DAO など） |


### 3-3. 機能の流れ（商品購入）

index.php で商品一覧を表示

goods.php で商品詳細 → カート追加

cart.php で確認 → ログイン → 購入ボタン押下

buy.php にて注文確定・DB登録

### 3-4. データベース概要
| テーブル名           | 主なカラム                          |
| --------------- | ------------------------------ |
| `goods`         | 商品コード、商品名、価格、画像など       |
| `goodsgroup`    | グループコード、グループ名                  |
| `users`         | ユーザID、名前、メール、パスワード（ハッシュ）、住所 など |
| `sales`        | 注文ID、ユーザID、日時、合計金額 など          |
| `sales_details` | 注文ID、商品コード、数量、単価               |

<h1 align="center">🙌 ご覧いただき、誠にありがとうございました！🙌</h1>
