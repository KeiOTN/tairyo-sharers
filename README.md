#大漁シェアーズcommit記録
## first commit
- Laravel Breeze認証
- 商品登録CRD(U未)
- ユーザー登録CR(UD未、画像未)
- おおまかな画面遷移(data未実装)

## 9/13 commit
- ユーザー登録U機能追加(D未、画像未)
- Service/UserService追加
- user関連、Auth::書き換え
- Laravel Collective inputの一部に実装(今後、順次書き換え予定)

## 9/14 commit
- 出品者画面に受取リクエスト表示

## 9/15 commit
- 出品者画面の受取リクエスト 受諾/拒否 操作実装
- profileへリンク追加

## 9/16 commit
- 受取リクエスト 詳細場面作成 メッセージ機能未実装
- FishSeeder使用可能

## 9/17 commit
- メッセージ機能 DB送信まで

## 9/21 commit
- メニューバー項目追加
- 取引中一覧作成中

## 9/23 commit
- 取引中画面実装
- メッセージ機能実装
- profile写真 編集機能 実装
- detail, each_requestにstatus表示実装

## 9/24 commit
- プロフィール編集のバグ修正

## 9/27 commit
- button color修正
- input画面レイアウト編集

## 9/27 commit
- MessageSeeder, PickupSeeder追加
- お知らせ画面(リクエストへの返信メッセージ表示) 実装

## 9/29 commit
- 9/28 AWSデプロイ
- お知らせ画面(出品した商品へのメッセージ表示) 実装

## 10/1 commit
- デプロイnull不具合解消
- button色変更

## 10/1 2nd commit
- npm run prod実行

## 10/4 commit
- sqlバックアップ作成
- いいね機能作成中(ajax)
- 諸々調査中にほぼ進捗なし

## 10/9 commit
- 言語設定jaに変更
- ファビコン設定
- ログインボタンレスポンシブ対応
- 削除時alert
- '削除しました'flash通知
- inputレイアウト変更




## will list 優先順位
必須
- contentの編集 実装
- お知らせ画面 実装(取引成立/不成立通知)
- formバリデーション
順次
- 取引完了通知
- 相互評価
- お気に入り機能
- 活動エリア/受取エリア設定





<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[CMS Max](https://www.cmsmax.com/)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). -->
