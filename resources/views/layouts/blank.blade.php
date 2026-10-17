<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? '' }}{{ config('app.name') ? ' | ' . config('app.name') : '' }}</title>
    <link rel="shortcut icon" type="image/png" href="/modern/src/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="/modern/src/assets/css/styles.min.css" />
    <link rel="stylesheet" href="/modern/src/assets/libs/select2/dist/css/select2.min.css" />
</head>

<body>
    @yield('content')
</body>

</html>
