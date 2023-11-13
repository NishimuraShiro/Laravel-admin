<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @foreach ($forms as $form)
        <div style="padding-top: 1cm; padding-left: 1cm;">
            <div style="display: flex">
                <div style="font-weight: 600; padding-right:8px; font-size:20px;">ID：</div>
                <div style="font-size:20px;">{{ $form->id }}</div>
            </div>
            <div style="display: flex">
                <div style="font-weight: 600; padding-right:8px; font-size:20px;">名前：</div>
                <div style="font-size:20px;">{{ $form->name }}</div>
            </div>
            <div style="display: flex">
                <div style="font-weight: 600; padding-right:8px; font-size:20px;">メールアドレス：</div>
                <div style="font-size:20px;">{{ $form->mail }}</div>
            </div>
            <div style="display: flex">
                <div style="font-weight: 600; padding-right:8px; font-size:20px;">年齢：</div>
                <div style="font-size:20px;">{{ $form->age }}</div>
            </div>
            --------------------------------------------
        </div>
    @endforeach
</body>

</html>
