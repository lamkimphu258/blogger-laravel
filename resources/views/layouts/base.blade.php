<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/bootstrap.css') }}">
    <script src="{{ secure_asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{ secure_asset('js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/d6903fe8c7.js" crossorigin="anonymous"></script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <title>@yield('title') - Blogger</title>
</head>
<body class="d-flex flex-column justify-content-between min-vh-100">
@include('partials.navigation')
<div class="container my-5">
    @yield('content')
</div>
@include('partials.footer')
</body>
</html>
