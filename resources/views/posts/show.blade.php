<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card mt-3">
                  <div class="card-header">
                      <h5>ミーティング名：{{ $post->name }}</h5>
                  </div>
                  <div class="card-body">
                    <p class="card-text">詳細：{{ $post->detail }}</p>
                    <p>投稿日時：{{ $post->created_at }}</p>
                    <p>開催URl：
                      <a href="{{ $post->url }}" target="_blank">{{ $post->url }}</a>
                    </p>

                    <p>時間帯：{{ $post->timezone_id }}</p>
                    <a onclick="history.back()" class="btn btn-primary">
                      戻る
                    </a>
                    <form action="{{ route('participant.store') }}" method="POST">
                      @csrf
                      <input type="hidden" value="{{ $post->id }}" name="id">
                      <input type="submit" value="参加する" name="participant" onclick="window.location.href='{{ $post->url }}'">
                    </form>
                  </div>
              </div>
          </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="#">
                <input type="hidden" name="post_id" value="">
                <div class="form-group">
                    <label>コメント</label>
                    <textarea class="form-control"
                    placeholder="内容" rows="5" name="body"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">コメントする</button>
            </form>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <h5 class="card-header">投稿者：Seedさん</h5>
                <div class="card-body">
                    <h5 class="card-title">投稿日時：2021/11/08</h5>
                    <p class="card-text">内容：今日のセブは快晴</p>
                </div>
            </div>
        </div>
      </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>
