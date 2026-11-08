<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Toys that grow little minds') | Kiddo's</title>
    <meta name="description" content="Kiddo's is a toy store in Jordan for kids aged 3 to 12. Pay cash on delivery.">

    <link rel="icon" type="image/png" href="{{ asset('assets/images/kiddos-icon.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@600;700;800&family=Nunito:wght@500;600;700;800&display=swap" rel="stylesheet">

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/storefront.css') }}" rel="stylesheet">

    @stack('styles')

    <link href="{{ asset('assets/css/storefront-ux.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/store-design.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/customer-polish.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/customer-motion.css') }}" rel="stylesheet">
</head>
<body>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="{{ asset('assets/js/storefront.js') }}" defer></script>
    <script src="{{ asset('assets/js/customer-motion.js') }}" defer></script>
    <script src="{{ asset('assets/js/storefront-ux.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
