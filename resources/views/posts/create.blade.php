<!DOCTYPE html>
<html lang="ja" class="create-html">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    <link rel="stylesheet" href="../css/posts/sample.css">
    <title>もくもく会新規作成</title>
</head>


<header class="sample-header">
    <div class="sample-openbtn4"><span></span><span></span><span></span></div>

    <!-- <script type="text/javascript" src="../views/users/script.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/5-2-4/js/5-2-4.js"></script>

    <!-- ロゴ -->

    <div class="btn-border-gradient-wrap">
        <a href="{{ url('/') }}" class="btn btn-border-gradient">SeedHub</a>
    </div>
    <!-- メールアイコン -->

    <div class="sample-mailbtn">
        <i class="sample-far fa-envelope"></i>
        <div class="sample-mail icon"></div>
    </div>

    <script src="{{ asset('../css/posts/script.js') }}"></script>
</header>

<body class="create-body">
    <div class="create-method">
        <h1 class="createh1">
            <p class="create-title"></p>
        </h1>
        <div class="create-note">

            <div class="create-wrapper">
                <form class="login" action="{{ route('posts.store') }}" method="POST">
                    {{ csrf_field() }}
                    <p class="title">もくもく会作成</p>
                    <div class="create-form-group">
                        <label>ミーティング名</label>
                        <input class="create-form-control" type="text" placeholder="タイトルを入力して下さい" name="meeting">
                        <i class="fa fa-user"></i>
                        @if ($errors->has('meeting'))
                        <!-- ここ追加 -->
                        <p class="validation">※ミーティング名を入力してください</p>
                        @endif
                    </div>

                    <div class="create-form-group">
                        <label>開始時間</label>
                        <input class="create-form-control" type="datetime-local" placeholder="開始時間を設定して下さい" name="starttime">
                        
                    </div>

                    <div class="create-form-group">
                        <label>終了時間</label>
                        <input class="create-form-control" type="datetime-local" placeholder="終了時間を設定して下さい" name="endtime">
                        
                    </div>

                    <div class="create-form-group">
                        <label>詳細情報</label>
                        <textarea class="create-form-control" placeholder="詳細情報を入力してください" name="detail"></textarea>
                        @if ($errors->has('detail'))
                        <!-- ここ追加 -->
                        <p class="validation">※詳細情報を入力してください</p>
                        @endif
                    </div>

                    <div class="create-form-group">
                        <label>URL</label>
                        <input class="create-form-control" type="text" placeholder="URLを入力して下さい" name="url">
                        @if ($errors->has('url'))
                        <!-- ここ追加 -->
                        <p class="validation">※URLを入力してください</p>
                        @endif
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

            </div>

        </div>

    </div>
</body>

</html>