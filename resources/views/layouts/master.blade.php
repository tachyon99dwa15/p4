<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title')</title>
    <meta charset='utf-8'>

    {{-- CSS global to every page can be loaded here --}}
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
          crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous"
    <link href='/css/stockkData.css' rel='stylesheet'>

    @yield('head')
</head>
<body>

<header>
    <a href='/'><img src='/images/stock-prices.jpg' id='logo' alt='Stocks Data System Logo'></a>
    <nav>
        <ul>
            @foreach(config('app.nav') as $link => $label)
                <li>
                    {{-- If the current path is the same as this link, display as plain text, not a hyperlink--}}
                    @if(Request::is($link))
                        {{ $label }}
                        {{-- Otherwise, display as a hyerlink --}}
                    @else
                        <a href='/{{ $link }}'>{{ $label }}</a>
                    @endif
                </li>
            @endforeach
        </ul>
    </nav>
</header>

<section id='main'>
    @yield('content')
</section>

<footer>
    <a href='{{ config('app.githubUrl') }}'><i class='fab fa-github'></i> View on Github</a>
</footer>
</body>
</html>