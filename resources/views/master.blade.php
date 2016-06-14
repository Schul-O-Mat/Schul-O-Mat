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
    <script>
        $(document).ready(function(){
            $('.collapsible').collapsible({
                accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
            });
        });
    </script>

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
    <ul class="collapsible" data-collapsible="expandable">
        <li>
            <div class="collapsible-header"><i class="material-icons">filter_list</i>Filtern</div>
            <div class="collapsible-body">
                <label class="flow-text">Schulart:</label>
                <p>
                    <input name="schulart" type="radio" id="privateschule" />
                    <label for="privateschule">Private Schule</label>
                </p>
                <p>
                    <input name="schulart" type="radio" id="oefentlicheschule" />
                    <label for="oefentlicheschule">&Ouml;ffentliche Schule</label>
                </p>
                <!-- Dropdown Trigger -->
                <a class='dropdown-button btn' href='#' data-activates='dropdown'>Drop Me!</a>

                <!-- Dropdown Structure -->
                <ul id='dropdown' class='dropdown-content'>
                    <li><a href="#!">ID 1</a></li>
                    <li><a href="#!">ID 2</a></li>
                    <li><a href="#!">ID 3</a></li>
                    <li><a href="#!">ID 4</a></li>
                    <li><a href="#!">ID 5</a></li>
                    <li><a href="#!">ID 6</a></li>
                    <li><a href="#!">ID 9</a></li>
                </ul>
                <p>
                    <input type="checkbox" name="1" id="grundschule" />
                    <label for="grundschule">Grundschule</label>
                </p>
                <p>
                    <input type="checkbox" name="2" id="hauptschule" />
                    <label for="hauptschule">Hauptschule</label>
                </p>
                <p>
                    <input type="checkbox" name="3" id="volksschule" />
                    <label for="volksschule">Volksschule</label>
                </p>
                <p>
                    <input type="checkbox" name="4" id="foerderschule" />
                    <label for="grundschule">F&ouml;rderschule</label>
                </p>
                <p>
                    <input type="checkbox" name="5" id="realschule" />
                    <label for="realschule">Realschule</label>
                </p>
                <p>
                    <input type="checkbox" name="6" id="sekundarschule" />
                    <label for="sekundarschule">Sekundarschule</label>
                </p>
                <p>
                    <input type="checkbox" name="7" id="gesamtschule" />
                    <label for="gesamtschule">Gesamtschule</label>
                </p>
                <p>
                    <input type="checkbox" name="8" id="gemeinschaftsschule" />
                    <label for="gemeinschaftsschule">Gemeinschaftsschule</label>
                </p>
                <p>
                    <input type="checkbox" name="9" id="waldorfschule" />
                    <label for="waldorfschule">Waldorfschule</label>
                </p>
                <p>
                    <input type="checkbox" name="10" id="hiberniaschule" />
                    <label for="hiberniaschule">Hiberniaschule</label>
                </p>
                <p>
                    <input type="checkbox" name="11" id="gymnasium" />
                    <label for="gymnasium">Gymnasium</label>
                </p>
                <p>
                    <input type="checkbox" name="12" id="weiterbildungskolleg" />
                    <label for="weiterbildungskolleg">Weiterbildungskolleg</label>
                </p>
                <p>
                    <input type="checkbox" name="13" id="berufskolleg" />
                    <label for="berufskolleg">Berufskolleg</label>
                </p>
                <p>
                    <input type="checkbox" name="14" id="krankenschule" />
                    <label for="weiterbildungskolleg">Schule f&uuml;r Kranke</label>
                </p>
                <p>
                    <input type="checkbox" name="15" id="foerderschuleimbereichderrealschule" />
                    <label for="foerderschuleimbereichderrealschule">F&ouml;rderschule im Bereich der Realschule</label>
                </p>
                <p>
                    <input type="checkbox" name="16" id="foerderschuleimbereichdesberufkollegs" />
                    <label for="foerderschuleimbereichdesberufkollegs">F&ouml;rderschule im Bereich des Berufskolleg</label>
                </p>
                <select name="ort">
                    <option value="" disabled selected>W&auml;hle deine Stadt aus</option>
                    <option value="1">Bonn</option>
                    <option value="2">Duisburg</option>
                    <option value="3">Dortmund</option>
                </select>
                <label>W&auml;hle den Ort aus</label>
                <button class="blue btn waves-effect waves-light" type="submit" name="action">Filtern
                    <i class="material-icons right">filter_list</i>
                </button>
            </div>
        </li>
    </ul>
    <hr />
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

                    <i class="material-icons circle
                              @if ($d->schulform == 2) light-green
                    @elseif ($d->schulform == 20) blue
                    @elseif ($d->schulform == 4) #aa00ff
                    @elseif ($d->schulform == 10) #d50000
                    @elseif ($d->schulform == 15) #ffff00
                    @else #9e9e9e
                              @endif
                              ">school</i>
                    <span class="title">{{$d->bezeichnung->schulbez1}}</span>
                          <p> @if($d->bezeichnung->schulbez2!=""){{$d->bezeichnung->schulbez2}}@endif </p>
                          <p> @if($d->bezeichnung->schulbez3!=""){{$d->bezeichnung->schulbez3}}@endif </p>
                          <p> @if($d->bezeichnung->kurzbez!=""){{$d->bezeichnung->kurzbez}}@endif     </p>
                    <a href="/schule/{{ $d->schulnr }}" class="secondary-content"><i class="blue-text material-icons">arrow_forward</i></a>
                </li>
                @endforeach
            </ul>
        </div>
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
