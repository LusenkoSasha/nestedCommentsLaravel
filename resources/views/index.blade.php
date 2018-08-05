<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>

<div id="app">
    <section class="hero">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Комментарии
                </h1>

                <comments></comments>

            </div>
        </div>
    </section>
</div>


<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
