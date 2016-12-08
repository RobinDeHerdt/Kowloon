<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div class="side-container">
        <div class="menu-items">   
            <div class="hamburger">
               <img src="/img/menu-icon.png" alt="menu" onclick="openMenu()">
            </div>
            <div class="upper-menu-item {{ Request::is('*/search*') ? 'active-menu' : '' }}">
                <a href="/search"><img src="/img/search-icon.png" alt="search"></a>
            </div>
            <div class="upper-menu-item {{ Request::is('*/faq') ? 'active-menu' : '' }}">
                <a href="/faq"><img src="/img/faq-icon.png" alt="faq" class="{{ Request::is('*/faq*') ? 'active-menu' : '' }}"></a>
            </div>
            <div class="upper-menu-item {{ Request::is('*/about') ? 'active-menu' : '' }}">
                <a href="/about"><img src="/img/contact-icon.png" alt="contact" class="{{ Request::is('*/contact*') ? 'active-menu' : '' }}"></a>
            </div>
        </div>
        <div class="divider">
            
        </div>
        <div class="category-items">
            <a href="/category/1"><img src="/img/dog.png" alt="dogs"  class="menu-img {{ Request::is('*/category/1*') ? 'active-item' : ''}}"></a>
            <a href="/category/2"><img src="/img/cat.png" alt="cats" class="menu-img {{ Request::is('*/category/2*') ? 'active-item' : ''}}"></a>
            <a href="/category/3"><img src="/img/fish.png" alt="fish" class="menu-img {{ Request::is('*/category/3*') ? 'active-item' : ''}}"></a>
            <a href="/category/4"><img src="/img/bird.png" alt="birds" class="menu-img {{ Request::is('*/category/4*') ? 'active-item' : ''}}"></a>
            <a href="/category/5"><img src="/img/hamster.png" alt="small animals" class="menu-img {{ Request::is('*/category/5*') ? 'active-item' : ''}}"></a>
        </div>
        <div class="footer-logo">
            <img src="/img/k_logo.png" alt="logo" class="footer-logo">
        </div>
    </div>
    <div id="menu-open">
        
    </div>
    @if (Auth::guest())
       
    @else
    <div class="admin-nav">
        <a href="/admin">Adminpanel</a>
        <a href="{{ url('/logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
    @endif

    <div class="main-container">
        @yield('content')
    </div>
    <script src="/js/app.js"></script>
    <script src="/js/sidebar.js"></script>
    </body>
</html>
