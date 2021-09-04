<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>もくもく会新規作成</title>
</head>
<body>
    <div>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div>
                <label>ミーティング名</label>
                <input type="text" placeholder="タイトルを入力して下さい" name="meeting">
            </div>
            <div>
                <label>開始時間</label>
                <input type="datetime-local" placeholder="開始時間を設定して下さい" name="starttime">
            </div>
            <div>
                <label>終了時間</label>
                <input type="datetime-local" placeholder="終了時間を設定して下さい" name="endtime">
            </div>
            <div>
                <label>詳細情報</label>
                <textarea placeholder="詳細情報を入力してください" name="detail"></textarea>
            </div>
            <div>
                <label>URL</label>
                <input type="text" placeholder="URLを入力して下さい" name="url">
            </div>
            <div>
                <label>カテゴリー</label>
                <select name="category">
                    <option value="1">ワイワイ</option>
                    <option value="2">もくもく</option>
                </select>
            </div>
            <div>
                <label>時間帯</label>
                <select name="timezone">
                    <option value="1">朝</option>
                    <option value="2">昼</option>
                    <option value="3">夜</option>
                </select>
            </div>
            <button type="submit">もくもく作成</button>
            </form>
        </div>
</body>
</html>
