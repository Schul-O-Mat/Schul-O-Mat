<html>
    <head>
    <meta charset="UTF-8">
    <title>Schul-O-Mat | Fragebogen</title>

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
            <a href="#!" class="brand-logo">Schul'O'Mat</a>
            <ul class="right hide-on-med-and-down">

                <li><a href=""><i class="material-icons">search</i></a></li>
                <li><a href=""><i class="material-icons dropdown-button" data-activates='dropdown'>more_vert</i></a></li>
            </ul>
            <ul id='dropdown' class='dropdown-content text-blue'>
                <li><a href="#!">Logout</a></li>
                <li><a href="#!">Swag</a></li>
            </ul>
            <ul class="left hide-on-med-and-down">
                <li><a href="schulen"><i class="material-icons">arrow_back</i></a></li>
            </ul>
        </div>
    </nav>

        <header>

        <h3 class="center-align">Hier sollte ein unabhängiges Feedback stehen!</h3>
            <form action="/schule/{{$id}}/redaktion" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="input-field col s12">
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea id="fundiertesfeedback" class="materialize-textarea" name="redaktionstext"></textarea>
                        <label for="fundiertesfeedback">Hier das Feedback</label>
                    </div>
                <br>
                <button class="waves-effect waves-light btn center-align" id="submitbutton" type="submit">Submit</button>
            </form>
    </header>
    </body>
</html>
