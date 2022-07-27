<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title', 'Laravel Ecommerce projet')
    </title>

    @include('partials.style')

</head>

<body>

    <div id="wrapper">
        @include('partials.navbar')

        @yield('content')

        @include('partials.footer')

    </div>

    @include('partials.scripts')


</body>

</html>