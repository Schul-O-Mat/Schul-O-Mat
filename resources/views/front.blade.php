<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <link rel="stylesheet" href="/sass/app.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf8">
    <title>Schul-O-Mat</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
</head>

<body>
    <nav>
        <div class="nav-wrapper blue">
             <img src="img/logo.png" class="schulomaticon">
            <a href="/" style="margin-left: auto !important;" class="brand-logo">Schul'O'Mat</a>
            <ul class="right hide-on-med-and-down">
                <!--                <li><a href=""><i class="material-icons">search</i></a></li>-->
                <li><a href="" class="dropdown-button" data-activates='dropdown'><i class="material-icons" >more_vert</i></a></li>
            </ul>
            <form action="/schulen/search" class="form header-search-wrapper hide-on-med-and-down" method="get">
                <!-- Search Url: /schulen/search/{key} -->
                <i class="material-icons active">search</i>
                <input name="searchword" class="header-search-input z-depth-2" placeholder="Suche" type="text" onChange="this.form.submit();">

            </form>
            <ul id='dropdown' class='dropdown-content text-blue'>
                @if(Auth::guest())
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
                @else
                <li><a href="#">Willkommen {{Auth::user()->name}}!</a></li>
                <li><a href="/logout">Logout</a></li>
                @endif
            </ul>

        </div>
    </nav>
    <header class="center-align">
        <h1>Schul-O-Mat</h1>
        <h2>Finde die Schule, die zu <span class="blue-text">dir </span><a href="/schulen"class="black-text">passt</a>!</h2>
    </header>
    <main class="container">
        <div class="row">
            <div class="col s12">
                <p class="flow-text">Möchtest du etwas über eine Schule erfahren?</p>
                <div class="row center-align">
                    <a href="/schulen" class="btn large blue">Schau dir alle Schulen an</a>
                    <a href="/schulen" class="btn large blue">Suche gezielt nach einer Schule</a>
                </div>
            </div>
            <div class="col s12">
                <p class="flow-text">Möchtest du etwas beitragen?</p>
                <div class="row center-align">
                    @if(Auth::guest())
                    <a href="/login" class="btn large blue">Log dich ein</a>
                    <a href="/register" class="btn large blue">Registriere dich beim Schul-O-Maten</a> @else
                    <a class="btn large blue">Du bist eingeloggt als {{Auth::user()->name}}!</a> @endif
                </div>
            </div>
        </div>
    </main>
    <footer>
        <hr>
        <p class="center-align">
            Made at Jugendhackt West 2016 by awesome people
        </p>
    </footer>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript " src="https://code.jquery.com/jquery-2.1.1.min.js "></script>
    <script type="text/javascript " src="/js/bin/materialize.js "></script>
</body>

</html>
