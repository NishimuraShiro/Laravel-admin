<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>技術者リスト</title>
</head>

<body>
    <h1>フォーム登録画面</h1>
    <form action="{{ route('form.store') }}" method="POST">
        @csrf
        <h3>名前：<input type="text" name="name"></h3>
        <h3>メールアドレス：<input type="text" name="mail"></h3>
        <h3>年齢：<input type="text" name="age"></h3>
        <h3>得意な言語：
            <select size="1" name="tech_id">
                <option value="1">HTML</option>
                <option value="2">PHP</option>
                <option value="3">CSS</option>
                <option value="4">JAVA</option>
                <option value="5">Ruby</option>
            </select>
        </h3>
        <button type="submit">登録する</button>
    </form>
    <h2>技術者リスト一覧</h2>
    @foreach ($index as $data)
        <div style="padding-left: 1cm;">
            <div style="display: flex">
                <div style="font-weight: 600; padding-right:8px; font-size:20px;">名前：</div>
                <div style="font-size:20px;">{{ $data->name }}</div>
            </div>
            <div style="display: flex">
                <div style="font-weight: 600; padding-right:8px; font-size:20px;">年齢：</div>
                <div style="font-size:20px;">{{ $data->age }}歳</div>
            </div>
            <div style="display: flex">
                <div style="font-weight: 600; padding-right:8px; font-size:20px;">得意な言語：</div>
                <div style="font-size:20px;">{{ $data->technology->proficient_language }}</div>
            </div>
            <div style="display: flex; flex-direction: column; align-items: baseline; margin-top: 6px;">
                <a href="{{ route('form.edit', ['id' => $data->id]) }}">編集</a>
                <form action="{{ route('form.delete', ['id' => $data->id]) }}">
                    @csrf
                    <button type="submit"style="background-color: crimson; color: white;">削除</button>
                </form>
            </div>
        </div>
        <div>--------------------------------------------</div>
    @endforeach
</body>

</html>
