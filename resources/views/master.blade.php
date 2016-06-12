<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Schul-O-Mat | Master</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <link rel="stylesheet" href="/sass/app.css">

    <!-- Compiled and minified JavaScript -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>

    <nav>
        <div class="nav-wrapper blue">
            <a href="/" class="brand-logo">Schul'O'Mat</a>
            <form action="/schulen/search" class="form header-search-wrapper hide-on-med-and-down" method="get">
                <!-- Search Url: /schulen/search/{key} -->
                <i class="material-icons active">search</i>
                <input name="searchword" class="header-search-input z-depth-2" placeholder="Suche" type="text" onChange="this.form.submit();">

            </form>
            <ul class="right">
                <li><a href="" class="dropdown-button" data-activates='dropdown'><i class="material-icons" >more_vert</i></a></li>
            </ul>
            <ul id='dropdown' class='dropdown-content text-blue'>
                @if(Auth::guest())
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
                @else
                <li><a href="#">Willkommen {{Auth::user()->name}}!</a></li>
                <li><a href="/logout">Logout</a></li>
                @endif
            </ul>
            <ul class="left hide-on-med-and-down">
                <li><a href="/"><i class="material-icons">arrow_back</i></a></li>
            </ul>

        </div>
    </nav>
    <ul class="pagination">
        @if ($zurueck)
        <li class="waves-effect"><a href="/schulen/{{$page-1}}"><i class="material-icons">chevron_left</i></a></li>
        @else
        <li class="waves-effect disabled"><a href="#"><i class="material-icons">chevron_left</i></a></li>
        @endif @if ($weiter)
        <li class="chevron_right waves-effect"><a href="/schulen/{{$page+1}}"><i class="material-icons">chevron_right</i></a></li>
        @else
        <li class="chevron_right waves-effect disabled"><a href="#"><i class="material-icons">chevron_right</i></a></li>
        @endif
    </ul>
    <div class="row">
        <div class="col s12">
            <ul class="collection">
                @foreach ($data as $d)
                <li class="collection-item avatar">
                    <i class="material-icons circle blue">school</i>
                    <span class="title">{{$d->bezeichnung->schulbez1}}</span>
                    <p>{{$d->bezeichnung->schulbez2}}
                        <br> {{$d->bezeichnung->schulbez3}}
                        <br> {{$d->bezeichnung->kurzbez}}
                    </p>
                    <a href="/schule/{{ $d->schulnr }}" class="secondary-content"><i class="blue-text material-icons">arrow_forward</i></a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <ul class="pagination">
        @if ($zurueck)
        <li class="waves-effect"><a href="/schulen/{{$page-1}}"><i class="material-icons">chevron_left</i></a></li>
        @else
        <li class="waves-effect disabled"><a href="#"><i class="material-icons">chevron_left</i></a></li>
        @endif @if ($weiter)
        <li class="chevron_right waves-effect"><a href="/schulen/{{$page+1}}"><i class="material-icons">chevron_right</i></a></li>
        @else
        <li class="chevron_right waves-effect disabled"><a href="#"><i class="material-icons">chevron_right</i></a></li>
        @endif
    </ul>
</body>

</html>