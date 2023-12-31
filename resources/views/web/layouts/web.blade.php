<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name') }}</title>
</head>
<body>
<section class="container px-4 mx-auto">

    @yield('header')

    <div>
        <x-messages />
        @yield('content')
    </div>
</section>
</body>
<script src="https://cdn.tailwindcss.com"></script>
</html>
