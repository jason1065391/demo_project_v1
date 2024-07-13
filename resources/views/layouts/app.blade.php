<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- 引入重置樣式 -->
    <link rel="stylesheet" href="{{ asset('css/base/reset.css') }}">
    <!-- 引入全局樣式 -->
    <link rel="stylesheet" href="{{ asset('css/base/global.css') }}">
    <!-- 引入其他樣式 -->
    <link rel="stylesheet" href="{{ asset('css/layouts/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive/responsive.css') }}">
    <!-- 引入頁面特定樣式 -->
    @stack('styles')
    <script src="{{ asset('js/script.js') }}" defer></script>
</head>
<body>
    @include('layouts.header')

    <div class="content">
        @yield('content')
    </div>

    @include('layouts.footer')
</body>
</html>