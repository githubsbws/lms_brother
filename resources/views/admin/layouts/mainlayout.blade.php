<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('admin.layouts.partials.head')

</head>

<body>


    @include('admin.layouts.partials.headerscript')

    @yield('content')

    @include('admin.layouts.partials.footer')

    @include('admin.layouts.partials.footerscript')

</body>

</html>