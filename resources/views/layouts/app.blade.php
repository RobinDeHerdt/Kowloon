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
            <img src="/img/menu-icon.png" alt="menu">
            <img src="/img/search-icon.png" alt="search">
            <img src="/img/faq-icon.png" alt="faq">
        </div>
        <div class="category-items">
            <img src="/img/dog.png" alt="dogs">
            <img src="/img/cat.png" alt="cats">
            <img src="/img/fish.png" alt="fish">
            <img src="/img/bird.png" alt="birds">
            <img src="/img/hamster.png" alt="small animals">
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
</body>
</html>
