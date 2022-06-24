<!DOCTYPE html>
<html lang="en">
<head>
   @include('Course_system.layouts.header')
</head>
<body class="layout-1 gradient" data-luno="theme-blue">
    @include('Course_system.layouts.sidebar')
    <div class="wrapper">
        @include('Course_system.layouts.navbar')

        @yield('content')

        @include('Course_system.layouts.footer')
    </div>
    @include('Course_system.layouts.js')
</body>
</html>
