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
    <title>Schul-O-Mat Detail</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper blue">
            <a href="#!" class="brand-logo">Schul'O'Mat</a>
            <ul class="right hide-on-med-and-down">

                <li><a href=""><i class="material-icons">search</i></a></li>
                <li><a href=""><i class="material-icons dropdown-button" data-activates='dropdown'>more_vert</i></a></li>
            </ul>

            <ul id='dropdown' class='dropdown-content text-blue'>
              @if(Auth::guest())
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
              @else
                <li><a href="#">Willkommen {{Auth::user()->name}}!</a></li>
                <li><a href="/logout">Logout</a></li>
              @endif
                <li class="divider"></li>
                <li><a href="http://le-styx.net/staff.gif">Swag</a></li>
            </ul>
            <ul class="left hide-on-med-and-down">

            </ul>

        </div>
    </nav>
    <header class="center-align">
        <h1>Schul'O'Mat</h1>
        <h2>Finde die Schule die zu dir <a href="/schulen">passt</a>!</h2>
    </header>
    <main>
        <!--<div class="collection">
            <a href="#!" class="collection-item">Steinbart</a>
            <a href="#!" class="collection-item">Hildegardis</a>
            <a href="#!" class="collection-item">Landfermann</a>
        </div>-->
    </main>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript " src="https://code.jquery.com/jquery-2.1.1.min.js "></script>
    <script type="text/javascript " src="/js/bin/materialize.js "></script>
</body>

</html>
