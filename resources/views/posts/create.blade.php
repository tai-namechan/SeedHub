<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>もくもく会新規作成</title>
</head>

<body>
    <div class="create-body">
        <h1 class="createh1">
            <p class="create-title"></p>
        </h1>
        <div class="create-method">

            <div class="wrapper">
                <form class="login" action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <p class="title">もくもく会作成</p>
                    <div class="create-form-group">
                        <label>ミーティング名</label>
                        <input class="create-form-control" type="text" placeholder="タイトルを入力して下さい" name="meeting">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="create-form-group">
                        <label>開始時間</label>
                        <input class="create-form-control" type="datetime-local" placeholder="開始時間を設定して下さい"
                            name="starttime">
                    </div>
                    <div class="create-form-group">
                        <label>終了時間</label>
                        <input class="create-form-control" type="datetime-local" placeholder="終了時間を設定して下さい"
                            name="endtime">
                    </div>
                    <div class="create-form-group">
                        <label>詳細情報</label>
                        <textarea class="create-form-control" placeholder="詳細情報を入力してください" name="detail"></textarea>
                    </div>
                    <div class="create-form-group">
                        <label>URL</label>
                        <input class="create-form-control" type="text" placeholder="URLを入力して下さい" name="url">
                    </div>
                    <div class="create-form-group">
                        <label>カテゴリー</label>
                        <select name="category">
                            <option value="1">ワイワイ</option>
                            <option value="2">もくもく</option>
                        </select>
                    </div>
                    <div class="create-form-group">
                        <label>時間帯</label>
                        <select name="timezone">
                            <option value="1">朝</option>
                            <option value="2">昼</option>
                            <option value="3">夜</option>
                        </select>
                    </div>
                    <button type="submit" class="post-btn">もくもく作成</button>
                </form>
                <footer><a target="blank" href="http://boudra.me/">boudra.me</a></footer>
            </div>

            <div class="crreate-formlist">
                
            </div>
        </div>

    </div>
</body>

</html>
