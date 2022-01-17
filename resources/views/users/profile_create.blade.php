<!DOCTYPE html>
<html lang="en" class="profile-create-html">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="../css/posts/sample.css">
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

<body class="profile-create-body">
      <div  class="profile-create-method" >
        <div class="profile-create-note">

        <h1 class="createh1">
              <p class="create-title"></p>
          </h1>
          <div>
            <div class="profile-create-wrapper">
              <form class="profile-create-form" action="{{ route('profiles.store') }}" method="POST">
                <p  class="title">マイプロフィール作成</p>
                @csrf
                {{-- プロフィール写真 --}}
                <div class="form-group picture">
                  <label class="space">写真</label>
                  <label>
                      <input ref="photo" name="post_image" type="file" class="create-form-control"
                          accept="image/gif,image/jpeg,image/png" @change="onFileChange" multiple>
                  </label>
              </div>
              
                {{-- 紹介文 --}}
                <div >
                    <label>紹介文</label>
                    <textarea class="create-form-control" placeholder="詳細情報を入力してください" name="introduction"></textarea>
                </div>
                
                <button type="submit" class="post-btn">もくもく作成</button>
                </form>
              
          </div>
          </div>
        </div>
  
      </div>
</body>
</html>