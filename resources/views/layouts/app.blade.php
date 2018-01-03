<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css"
          integrity="sha256-xbQIJkhfOw0Dry1H9lawvXRi9XcqdE8jDBZx1Op/mz8=" crossorigin="anonymous"/>
    <link rel="stylesheet" href="/sass/app.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf8">
    <title>Schul-O-Mat</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    @yield("css")
</head>

<body>
<nav>
    <div class="nav-wrapper blue">

        <a href="{{ action("IndexController@index") }}" style="margin-left: auto !important;" class="brand-logo"> <img
                    src="/img/logo.png" class="schulomaticon"></a>
        <ul class="right hide-on-med-and-down">
            {{--<li><a href=""><i class="material-icons">search</i></a></li>--}}
            <li><a href="#" class="dropdown-button" data-activates='dropdown'><i
                            class="material-icons">more_vert</i></a></li>
        </ul>
        <form action="{{ action("SearchController@searchGet") }}"
              class="form header-search-wrapper hide-on-med-and-down" method="get">
            {{--Search Url: /schulen/search/{key}--}}
            <i class="material-icons active">search</i>
            <input name="searchword" class="header-search-input hoverable" pattern="[A-Za-z]{3,}"
                   title="Du musst mindestens 3 Buchstaben eingeben" placeholder="Suche" type="text">
            <input type="hidden" name="page" value="0">

        </form>
        <ul id='dropdown' class='dropdown-content text-blue'>
            @if(Auth::guest())
                <li><a href="{{ action("Auth\AuthController@getLogin") }}">Anmelden</a></li>
            @else
                <li><a href="#">Willkommen {{Auth::user()->name}}!</a></li>
                @if(Auth::user()->type == "student")
                    <li><a href="{{ action("UserVerwaltungController@index") }}">Dein Account</a></li>
                @elseif(Auth::user()->type == "school")
                    <li><a href="{{ action("SchulVerwaltungController@index", ["id" => Auth::user()->schulID]) }}">Schulverwaltung</a></li>
                @endif
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
@yield("js")
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"
        integrity="sha256-lVmbGVbzHBkNHCUK0y+z2AyJei/v7jSNYppXTcq2FtU=" crossorigin="anonymous"></script>
<!-- Piwik -->
<script type="text/javascript">
    var _paq = _paq || [];
    /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
        var u="https://analytics.labcode.de/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', '2']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
    })();
</script>
<!-- End Piwik Code -->
</body>

</html>
