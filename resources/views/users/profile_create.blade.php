<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./accets/css/style2.css">
</head>
<body>
  <header>マイプロフィール作成</header>
  <main>
    <form action="{{ route('profiles.store') }}" method="POST">
      @csrf
      {{-- <div>
          <label>プロフィール写真</label>
          <input type="datetime-local" placeholder="開始時間を設定して下さい" name="iamge">
      </div> --}}
      <div>
          <label>紹介文</label>
          <textarea placeholder="詳細情報を入力してください" name="introduction"></textarea>
      </div>
      
      <button type="submit">もくもく作成</button>
      </form>
  </main>
</body>
</html>