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
        @include('frontend.component.head')
        
    </head>
    @if(isset($schema))
        {!! $schema !!}
    @endif
    <body>
        @include('frontend.component.header')

        @yield('content')

        @include('frontend.component.footer')
        @include('frontend.component.script')
    </body>
</html>