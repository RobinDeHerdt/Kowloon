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
                <a href="#"><img src="/img/menu-icon.png" alt="menu"></a>
            </div>
            <a href="#"><img src="/img/search-icon.png" alt="search"></a>
            <a href="#"><img src="/img/faq-icon.png" alt="faq"></a>
        </div>
        <div class="divider">
            
        </div>
        <div class="category-items">
            <a href="/category/1"><img src="/img/dog.png" alt="dogs"  class="menu-img"></a>
            <a href="/category/2"><img src="/img/cat.png" alt="cats" class="menu-img"></a>
            <a href="/category/3"><img src="/img/fish.png" alt="fish" class="menu-img"></a>
            <a href="/category/4"><img src="/img/bird.png" alt="birds" class="menu-img"></a>
            <a href="/category/5"><img src="/img/hamster.png" alt="small animals" class="menu-img"></a>
        </div>
        <div class="footer-logo">
            <img src="/img/k_logo.png" alt="logo" class="footer-logo">
        </div>
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
    <script type="text/javascript">
            var splitUrl         = window.location.href.split('/');

            if(splitUrl[4] == 'category')
            {
                var selectedCategory    = splitUrl[5];
                var menu_items          = document.getElementsByClassName('menu-img');

                menu_items[selectedCategory.charAt(0) - 1].className += ' active-item';
            }
            
        </script>
</body>
</html>
