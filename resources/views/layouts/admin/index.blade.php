<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Sistem Pelaporan Satpol PP</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('template/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    @stack('style')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/components.css') }}">

</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            @include('layouts.admin.partials.navbar')

            @include('layouts.admin.partials.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
            @include('layouts.admin.partials.footer')
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('template/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('template/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('template/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('template/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('template/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
    @stack('script')

    <!-- Template JS File -->
    <script src="{{ asset('template/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('template/assets/js/custom.js') }}"></script>
</body>

</html>
