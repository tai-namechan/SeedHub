<!DOCTYPE html>
<html lang="en" class="profile-create-html">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
    <body class="profile-create-body">
      <div  class="profile-create-method" >
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
</body>
</html>