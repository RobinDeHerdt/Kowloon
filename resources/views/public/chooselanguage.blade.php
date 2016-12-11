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
    <img src="/img/logo.png" alt="Kowloon logo" class="language-logo">
    <div class="language-container">
        <div class="language">
            <a href="/nl/home">
                <span>Nederlands</span>
            </a>
        </div>
        <div class="language">
            <a href="/fr/home">
                <span>Francais</span>
            </a>
        </div>
    </div>
</body>
</html>