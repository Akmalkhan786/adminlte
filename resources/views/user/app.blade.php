<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.layouts.head')
</head>

<body>

@include('user.layouts.navbar')
    @yield('main-content')
@include('user.layouts.footer')

</body>

</html>
