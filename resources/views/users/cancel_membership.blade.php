<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>退会ページ</title>
    <link rel="stylesheet" href="./css/cancel-the-membership.css">
</head>
<body>
    <header>
        <a href="" class="toppage-jump">Sweets Guide</a>
    </header>
    <main>
    <div class="container">
        <div class="box">
            <article class="card">
                <div class="content">
                    <h1>最終確認</h1>
                    <h2>ユーザー登録を退会します</h2>
                            <p>退会後、あなたが過去に投稿された口コミは<br>”退会ユーザー"として、残ることになります</p>
                    <div class="sendbutton">        
                        {{-- ↓前のページに戻るボタン --}}
                    <button type="button" onclick="history.back()">ユーザーページに戻る</button>
                    <div class="card-body text-center">
                        {{-- アクション先はルーティングでつけたルート名 --}}
                        <form method="POST" action="{{ route('deactive') }}">
                            @csrf
                            <button type="submit" class="btn">
                                退会する
                            </button>
                        </form>
                    </div>
                </div>
                </div>
            </article>
        </div>
    </div>
</main>
<footer>

</footer>
</body>
</html>