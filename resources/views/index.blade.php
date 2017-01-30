<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bagu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.0/css/bulma.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/bagu/css/bundle.css') }}">
</head>
<body>

    <div class="container">
        <div id="app">
            <router-view></router-view>
        </div>
    </div>

    <script src="{{ asset('vendor/bagu/js/bundle.js') }}"></script>
</body>
</html>
