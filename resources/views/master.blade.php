<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Schul-O-Mat | Master</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <nav>
        <div class="blue nav-wrapper">
            <form>
                <div class="input-field">
                    <input id="search" type="search">
                    <label for="search"><i class="material-icons">search</i></label>
                    <i class="material-icons">close</i>
                </div>
            </form>
        </div>
    </nav>
    <ul class="pagination">
        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
    </ul>
        <div class="row">
        <div class="col s12">
            <ul class="collection">
              @foreach ($data as $d)
                <li class="collection-item avatar">
                    <i class="material-icons circle blue">school</i>
                    <span class="title">{{$d->bezeichnung->schulbez1}}</span>
                    <p>{{$d->bezeichnung->schulbez2}} <br>
                       {{$d->bezeichnung->schulbez3}} <br>
                       {{$d->bezeichnung->kurzbez}}
                    </p>
                    <a href="/schulen/{{ $d->schulnr }}" class="secondary-content"><i class="blue-text material-icons">arrow_forward</i></a>
                </li>
              @endforeach
            </ul>
        </div>
    </div>
    <ul class="pagination">
        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
    </ul>
</body>
</html>
