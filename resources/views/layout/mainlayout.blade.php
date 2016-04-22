<html>
<head>
    <script src="/js/bootstrap.min.js"></script>
    <link href="/css/bootstrap.css" rel="stylesheet"/>
</head>
<body>
<ul class="nav nav-tabs">
    <li role="presentation"><a href="/">Главная</a></li>
    <li role="presentation"><a href="/drinks/">Напитки</a></li>
    <li role="presentation"><a href="/books/">Книги</a></li>
    <li role="presentation"><a href="/categories/">Категории</a></li>
    <li role="presentation"><a href="/countries/">Страны</a></li>
</ul>

<div class="container">
    @yield('content')
</div>

</body>
</html>