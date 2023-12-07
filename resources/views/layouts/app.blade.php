<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog App</title>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

    <div class="header">
        <div class="nav-container">
            <nav>
                <a href="{{ route('posts.create') }}">Создание поста</a>
                <a href="{{ route('posts.index') }}">Просмотр постов</a>
            </nav>
        </div>
    </div>

    <div>
        @yield('content')
    </div>
</body>

</html>


<style>
    /* styles.css */

body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
}

.header {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
}

.nav-container {
    width: 95%;
    margin: 0 auto;
}

nav {
    display: flex;
    gap: 20px;
    justify-content: end;
}

nav a {
    color: #fff;
    text-decoration: none;
    padding: 10px;
    border-radius: 4px;
}

nav a:hover {
    background-color: #555;
}
</style>