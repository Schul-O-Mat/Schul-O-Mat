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
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
</head>

<body>

    <nav>
        <div class="nav-wrapper blue">
            <a href="/" style="" class="brand-logo"> <img src="/img/logo.png" class="schulomaticon"></a>
            <form action="/schulen/search" class="form header-search-wrapper hide-on-med-and-down" method="get">
                <!-- Search Url: /schulen/search/{key} -->
                <i class="material-icons active">search</i>
                <input name="searchword" class="header-search-input z-depth-2" placeholder="Suche" type="text" onChange="this.form.submit();">

            </form>
            <ul class="right">
                <li><a href=""><i class="material-icons dropdown-button" data-activates='dropdown'>more_vert</i></a></li>
            </ul>
            <ul id='dropdown' class='dropdown-content text-blue'>
                <li><a href="#!">Login</a></li>
                <li><a href="#!">Register</a></li>
                <li class="divider"></li>
                <li><a href="#!">Swag</a></li>
            </ul>
            <ul class="left hide-on-med-and-down">
                <li><a href="/"><i class="material-icons">arrow_back</i></a></li>
            </ul>

        </div>
    </nav>
    <div class="row">
        <div class="col s12">
            <ul class="collection">
                @foreach ($data as $d)
                <li class="collection-item avatar">
                    <i class="material-icons circle 
                              @if ($d->schulform == 2) light-green
                    @elseif ($d->schulform == 20) blue @endelseif
                    @elseif ($d->schulform == 4) #aa00ff @endelseif
                    @elseif ($d->schulform == 10) #d50000 @endelseif
                    @elseif ($d->schulform == 15) #ffff00 @endelseif
                    @else #9e9e9e
                              @endif
                              ">school</i>
                    <span class="title">{{$d->schulbez1}}</span>
                    <p>{{$d->schulbez2}}
                        <br> {{$d->schulbez3}}
                        <br> {{$d->kurzbez}}
                    </p>
                    <a href="/schule/{{ $d->schulnr }}" class="secondary-content"><i class="blue-text material-icons">arrow_forward</i></a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>

</html>