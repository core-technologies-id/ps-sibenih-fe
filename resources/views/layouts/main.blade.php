<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')

    @yield('style')
</head>

<body>
    <!-- Body Inner -->
    <div class="body-inner">
        @yield('content')
    </div>
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/functions.js') }}"></script>
    @yield('script')
</body>

</html>
