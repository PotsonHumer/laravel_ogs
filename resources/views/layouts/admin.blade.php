<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('favicon')

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/admin.css" rel="stylesheet">

</head>
<body class="floatBgBefore floatBgAfter">

    @if (Auth::check())
    <header class="container-fluid floatBgBefore floatBgAfter">
        <div class="row flex flex-middle">
            <h1 class="col-xs-4 col-md-6"><a href="/admin"><img src="{{ URL::asset('/images/logo_b.svg') }}"><span>後台管理系統</span></a></h1>
            <nav class="col-xs-8 col-md-6">
                <ul class="flex flex-middle flex-right">
                    <li><a href="{{ url('/admin') }}"><i class="fa fa-tachometer fa-lg"></i><span>後台首頁</span></a></li>
                    <li><a href="{{ url('/') }}"><i class="fa fa-home fa-lg"></i><span>網站首頁</span></a></li>
                    <li><a href="{{ url('/admin/logout') }}"><i class="fa fa-sign-out fa-lg"></i><span>登出</span></a></li>
                </ul>
            </nav>
        </div>
    </header>
    @endif

    <main class="container-fluid">
        <div class="row flex flex-wrap">
            @if (Auth::check())
            <aside class="col-xs-12 col-sm-3 col-lg-2">
                <ul>
                    <li>
                        <a href="#" class="flex flex-middle">
                            <span>TEST</span>
                            <i class="fa fa-chevron-right"></i>
                        </a>
                        <ul>
                            <li><a href="#">SUB TEST</a></li>
                            <li><a href="#">SUB TEST</a></li>
                            <li><a href="#">SUB TEST</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="flex flex-middle">
                            <span>TEST</span>
                            <i class="fa fa-chevron-right"></i>
                        </a>
                        <ul>
                            <li><a href="#">SUB TEST</a></li>
                            <li><a href="#">SUB TEST</a></li>
                            <li><a href="#">SUB TEST</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="flex flex-middle">
                            <span>TEST</span>
                            <i class="fa fa-chevron-right"></i>
                        </a>
                        <ul>
                            <li><a href="#">SUB TEST</a></li>
                            <li><a href="#">SUB TEST</a></li>
                            <li><a href="#">SUB TEST</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="flex flex-middle">
                            <span>TEST</span>
                            <i class="fa fa-chevron-right"></i>
                        </a>
                        <ul>
                            <li><a href="#">SUB TEST</a></li>
                            <li><a href="#">SUB TEST</a></li>
                            <li><a href="#">SUB TEST</a></li>
                        </ul>
                    </li>
                </ul>
            </aside>
            @endif
            <article class="@if (Auth::check()) col-xs-12 col-sm-9 col-lg-10 @else col-xs-12 @endif">
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
