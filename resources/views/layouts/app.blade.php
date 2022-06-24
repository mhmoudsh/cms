<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.header')
</head>

<body class="layout-1 gradient" data-luno="theme-blue">
    @include('layouts.sidebar')
    <div class="wrapper">
        @include('layouts.navbar')

        @yield('content')

        @include('layouts.footer')
    </div>
    @include('layouts.js')
</body>

</html>
