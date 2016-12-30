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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body onunload="savePos()">
    @if (Cookie::get('cookiePopup') === null)
    <div class="cookie-overlay">
        <div class="cookie-module">
            <img src="/img/cookie.png" alt="dog bone">
            <div class="cookie-module-content">
                <div class="close-cookie-window" onclick="closeCookieWindow()">
                    <span id="close-cookie-window">X</span>
                </div>
                <span class="title">Cookies</span>
                <p>{{ trans('messages.cookies') }}</p>
                <button type="submit" onclick="closeCookieWindow()">{{ trans('messages.cookies_continue') }}</button>
            </div>
        </div>
    </div>
    @endif
    <div class="side-container">
        <div class="menu-items">   
            <div class="hamburger">
               <i class="sprite nav-sprite-menu-icon" onclick="openMenu()"></i>
            </div>
            <div class="upper-menu-item {{ Request::is('*/search*') ? 'active-menu' : '' }}">
                <a href="/search"><i class="sprite nav-sprite-search-icon"></i></a>
            </div>
            <div class="upper-menu-item {{ Request::is('*/faq') ? 'active-menu' : '' }}">
                <a href="/faq"><i class="sprite nav-sprite-faq-icon"></i></a>
            </div>
            <div class="upper-menu-item {{ Request::is('*/about') ? 'active-menu' : '' }}">
                <a href="/about"><i class="sprite nav-sprite-contact-icon"></i></a>
            </div>
        </div>
        <div class="divider">
            
        </div>
        <div class="category-items">
            <a href="/category/1"><i class="sprite nav-sprite-dog menu-img {{ Request::is('*/category/1*') ? 'active-item' : ''}}"></i></a>
            <a href="/category/2"><i class="sprite nav-sprite-cat menu-img {{ Request::is('*/category/2*') ? 'active-item' : ''}}"></i></a>
            <a href="/category/3"><i class="sprite nav-sprite-fish menu-img {{ Request::is('*/category/3*') ? 'active-item' : ''}}"></i></a>
            <a href="/category/4"><i class="sprite nav-sprite-bird menu-img {{ Request::is('*/category/4*') ? 'active-item' : ''}}"></i></a>
            <a href="/category/5"><i class="sprite nav-sprite-hamster menu-img {{ Request::is('*/category/5*') ? 'active-item' : ''}}"></i></a>
        </div>
        <div class="footer-logo">
            <img src="/img/k_logo.png" alt="logo" class="footer-logo">
        </div>
    </div>
    <div id="menu-open">
        
    </div>
    @yield('content')
    <script src="/js/app.js"></script>
    <script src="/js/all.js"></script>
    @yield('scripts')
    </body>
</html>