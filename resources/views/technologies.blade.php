<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @foreach ($technologies as $technology)
        <div style="padding-top: 1cm; padding-left: 1cm;">
            <div style="display: flex;">
                <div style="font-size: 20px; padding-right:8px;">{{ $technology->tech_id }}：</div>
                <div style="font-size: 20px;">{{ $technology->proficient_language }}</div>
            </div>
        </div>
    @endforeach
</body>

</html>
