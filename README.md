# Laravelの練習用。「輪読会」アプリをぼちぼち書いていく。

# DDD 参考
## 新原さん
https://github.com/shin1x1/laravel-ddd-sample  
https://speakerdeck.com/shin1x1/201703-ddd-with-laravel  
## ボトムアップDDD
https://nrslib.com/bottomup-ddd/  
https://snamiki1212.com/bu-ddd-2  

# 輪読アプリ
##  データ
- 輪読会 Circle
    - 対象の本(1) Book
    - 主催者(N) Member
    - 参考URL(N) Url
- 輪読メンバー
    - メンバー(N) Member
- 輪読スケジュール GatheringSchedule
    - 対象の章/範囲
    - リアル輪読会の日時予定
- 一回の集まりの内容 Gathering
    - 対象の章の概要(1)
        - 投稿者、内容、日時
    - オンラインのディスカッション(N)
        - 投稿者、内容、日時
    - 輪読会の議事録(1)
        - 投稿者、内容、日時

- メンバー Member
    - ID
    - 名前
    - ログインID
    - 表示用名前

- 本 Book
    - ID
    - ISBN
    - タイトル

## ディレクトリ

```
MyApp
    ReadingCircles
        Application
            Auth
            Http
                Controllers
                Middleware
                Requests
            Providers
            UseCases
        Domain
            DomainServices
            Models
        Infrastructure
            ApiCallers
            DAOs
            Repositories
```
