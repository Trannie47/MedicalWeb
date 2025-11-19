<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'THIỆN TÂM MEDICAL')</title>
    <link rel="icon" type="image/png" href="{{ asset('asset/img/logo.png') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Splide CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/css/splide.min.css">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    {{-- Header & Footer CSS --}}
    @php
        // Chỉ share CSS/JS, không echo HTML
        $header = new \App\View\Components\Header();
        $header->prepare();
        $footer = new \App\View\Components\Footer();
        $footer->prepare();
    @endphp
    
    {!! view()->shared('header_styles') ?? '' !!}
    {!! view()->shared('footer_styles') ?? '' !!}

    {{-- CSS riêng từng trang --}}
    @stack('styles')
</head>
<body>

    {{-- Header component HTML --}}
    {!! $header->html() !!}   {{-- chỉ render HTML mà không inject thêm CSS/JS --}}

    {{-- Nội dung từng trang --}}
    @yield('content')

    {{-- Footer component HTML --}}
    {!! $footer->html() !!}

    <!-- Splide JS -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/js/splide.min.js"></script>
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    {{-- Header & Footer JS --}}
    {!! view()->shared('header_scripts') ?? '' !!}
    {!! view()->shared('footer_scripts') ?? '' !!}

    {{-- JS riêng từng trang --}}
    @stack('scripts')
</body>
</html>
