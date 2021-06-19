<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('tittle')</title>
    @include('includes/style')
    @stack('add-css')
</head>

<body>

    <!-- navbar  -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
        <div class="container">
        <a href="/" class="navbar-brand">
            <img src="/images/logo.svg" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto d-relative" style="positon: relative;">
            <li class="nav-item {{ (request()->is('/') ) ?  'active' : '' }}">
                <a href="/" class="nav-link">Home</a>
            </li>
            <li class="nav-item {{ (request()->is('categori*') ) ?  'active' : '' }}">
                <a href="{{ route('categori-all') }}" class="nav-link">Kategori</a>
            </li>
            <li class="nav-item {{ (request()->is('contact') ) ?  'active' : '' }}">
                <a href="{{ route('contact') }}" class="nav-link">Contact</a>
            </li>
            </ul>
            
        </div>
        </div>
    </nav>
    
    @yield('content')

    @include('includes/footer')
</body>

    @include('includes/script')
    @stack('add-script')

</html>
