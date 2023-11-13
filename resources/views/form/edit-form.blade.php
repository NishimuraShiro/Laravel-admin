<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Form</title>
</head>

<body>
    <h1>編集ページ</h1>
    <form action="{{ route('form.update', ['id' => $editForm->id]) }}" method="POST">
        @csrf
        <h3>名前：<input type="text" value="{{ $editForm->name }}" name="name"></h3>
        <h3>メールアドレス：<input type="text" value="{{ $editForm->mail }}" name="mail"></h3>
        <h3>年齢：<input type="text" value="{{ $editForm->age }}" name="age"></h3>
        <h3>得意な言語：
            <select name="tech_id" size="1" value="{{ $editForm->tech_id }}">
                <option value="1" @if ($editForm->tech_id == 1) selected @endif>HTML</option>
                <option value="2" @if ($editForm->tech_id == 2) selected @endif>PHP</option>
                <option value="3" @if ($editForm->tech_id == 3) selected @endif>CSS</option>
                <option value="4" @if ($editForm->tech_id == 4) selected @endif>JAVA</option>
                <option value="5" @if ($editForm->tech_id == 5) selected @endif>Ruby</option>
            </select>
        </h3>
        <input type="submit" value="更新する">
    </form>
</body>

</html>
