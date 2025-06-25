<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-9XNKRDPL8T"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-9XNKRDPL8T');
        </script>
        @include('mobile.component.head')
    </head>
    <body>
        @include('mobile.component.header')

        @yield('content')

        @include('mobile.component.footer')
        @include('mobile.component.script')
    </body>
</html>