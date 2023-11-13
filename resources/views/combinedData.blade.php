<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @foreach ($combinedData as $data)
        <div style="padding-top: 1cm; padding-left: 1cm;">
            <div style="display: flex">
                <div style="font-weight: 600; padding-right:8px; font-size:20px;">名前：</div>
                <div style="font-size:20px;">{{ $data->name }}</div>
            </div>
            <div style="display: flex">
                <div style="font-weight: 600; padding-right:8px; font-size:20px;">年齢：</div>
                <div style="font-size:20px;">{{ $data->age }}</div>
            </div>
            <div style="display: flex">
                <div style="font-weight: 600; padding-right:8px; font-size:20px;">言語：</div>
                <div style="font-size:20px;">{{ $data->technology->proficient_language }}</div>
                {{-- $data->proficient_language これはEloquentを定義しない時のデータ表示方法 --}}
            </div>
        </div>
        <div style="padding-top: 1cm;">--------------------------------------------</div>
    @endforeach
</body>

</html>
