<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <h1>Website PHP Native Hore</h1>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} - Hak Cipta Dilindungi</p>
    </footer>
</body>
</html>
