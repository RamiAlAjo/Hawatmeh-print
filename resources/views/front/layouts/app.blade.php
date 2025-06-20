<meta name="viewport" content="width=device-width, initial-scale=1.0">

@include('front.layouts.styles')

@include('front.layouts.navbar')

<body>
    <!-- Main container with fluid layout -->
    <div class="container-fluid">
        <div class="main-content">
            @yield('content')
        </div>
    </div>

    @include('front.layouts.footer')

    @include('front.layouts.scripts')

    @yield('scripts') <!-- For page-specific scripts -->
</body>
