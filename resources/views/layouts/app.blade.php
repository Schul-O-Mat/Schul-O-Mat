<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" integrity="sha256-xbQIJkhfOw0Dry1H9lawvXRi9XcqdE8jDBZx1Op/mz8=" crossorigin="anonymous" />
    <link rel="stylesheet" href="/sass/app.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf8">
    <title>Schul-O-Mat</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    @yield("css")
</head>

<body>
    <nav>
        <div class="nav-wrapper blue">

            <a href="{{ action("IndexController@index") }}" style="margin-left: auto !important;" class="brand-logo"> <img src="/img/logo.png" class="schulomaticon"></a>
            <ul class="right hide-on-med-and-down">
                <!--                <li><a href=""><i class="material-icons">search</i></a></li>-->
                <li><a href="#" class="dropdown-button" data-activates='dropdown'><i class="material-icons" >more_vert</i></a></li>
            </ul>
            <form action="{{ action("SearchController@searchGet") }}" class="form header-search-wrapper hide-on-med-and-down" method="get">
                <!-- Search Url: /schulen/search/{key} -->
                <i class="material-icons active">search</i>
                <input name="searchword" class="header-search-input hoverable" pattern="[A-Za-z]{3,}" title="Du musst mindestens 3 Zeichen eingeben" placeholder="Suche" type="text">
                <input type="hidden" name="page" value="0">

            </form>
            <ul id='dropdown' class='dropdown-content text-blue' style=" right: 0 !important;left: auto !important;width: 300px;">
                @if(Auth::guest())
                <li><a href="{{ action("Auth\AuthController@getLogin") }}">Anmelden</a></li>
                @else
                <li><a href="#">Willkommen {{Auth::user()->name}}!</a></li>
                <li><a href="{{ action("Auth\AuthController@getLogout") }}">Logout</a></li>
                @endif
            </ul>

        </div>
    </nav>
    <header class="center-align">
        @yield("header")
    </header>
    @yield("main")

    @include('footer')
    <!--Import jQuery before materialize.js-->
    @yield("js")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js" integrity="sha256-lVmbGVbzHBkNHCUK0y+z2AyJei/v7jSNYppXTcq2FtU=" crossorigin="anonymous"></script>
</body>

</html>
