<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="/css/admin.css" rel="stylesheet">

</head>
<body>

    @if (Auth::check())
    <header class="container-fluid floatBgBefore floatBgAfter">
        <div class="row flex flex-middle">
            <h1 class="col-xs-12 col-md-6"><a href="/admin">後台管理系統</a></h1>
            <nav class="col-xs-12 col-md-6">
                <ul class="flex flex-middle flex-right">
                    <li><a href="/admin">後台首頁</a></li>
                    <li><a href="/">網站首頁</a></li>
                </ul>
            </nav>
        </div>
    </header>
    @endif

    <main class="container-fluid">
        <div class="row">
            @if (Auth::check())
            <aside class="col-xs-12 col-sm-3 col-md-2">
                <ul>
                    <li>
                        <a href="#">TEST</a>
                        <ul>
                            <li><a href="#">SUB TEST</a></li>
                            <li><a href="#">SUB TEST</a></li>
                            <li><a href="#">SUB TEST</a></li>
                        </ul>
                    </li>
                    <li><a href="#">TEST</a></li>
                    <li><a href="#">TEST</a></li>
                    <li><a href="#">TEST</a></li>
                </ul>
            </aside>
            @endif
            <article class="@if (Auth::check()) col-xs-12 col-sm-9 col-md-10 @else col-xs-12 @endif">
                <div class="row">
                    @yield('content')
                </div>
            </article>
        </div>
    </main>

    <script src="/js/jquery-3.2.1.min.js" defer></script>
    <script src="/js/bootstrap.min.js" defer></script>
</body>
</html>
