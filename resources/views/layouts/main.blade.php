<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')

    @yield('style')
</head>

<body>
    <!-- Body Inner -->

    <div class="body-inner">
        @include('components.header')
        @yield('content')
        @include('components.footer')
    </div>
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/functions.js') }}"></script>
    <script src="{{ asset('assets/plugins/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @yield('script')
</body>

</html>
