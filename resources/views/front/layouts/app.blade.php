@include('front.layouts.styles')

@include('front.layouts.navbar')

{{-- <body> --}}
<div class="main-content">
    @yield('content')
</div>

@include('front.layouts.footer')

@include('front.layouts.scripts')
{{-- @yield('scripts') --}}
{{-- </body> --}}
