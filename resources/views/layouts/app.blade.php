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

body {
    font-family: 'Nunito', sans-serif;
    margin: 0;
    padding: 0; 
}

.header {
    background-color: #007bff;
    color: #fff;
    padding: 10px;
}

.nav-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

nav {
    display: flex;
}

nav a {
    margin-right: 15px;
    text-decoration: none;
    font-weight: bold;
    color: #fff;
}

nav a:hover {
    text-decoration: underline;
}

    </style>