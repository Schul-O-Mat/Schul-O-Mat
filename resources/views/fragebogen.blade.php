

<!DOCTYPE html>
<html lang="en">
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

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
            <li><a href="#!">Login</a></li>
            <li><a href="#!">Register</a></li>
            <li class="divider"></li>
            <li><a href="#!">Swag</a></li>
        </ul>
        <ul class="left hide-on-med-and-down">
            <li><a href="master.html"><i class="material-icons">arrow_back</i></a></li>
        </ul>

    </div>
</nav>
<form action="#">
    <div class="row">
        <div class="col s12">
            <div class="col s6">
                <label class="flow-text" for="schoolgeneral">Wie findest du deine Schule?</label>
            </div>
                <p class="range-field">
                    <input style="width: 50%" type="range" id="schoolgeneral" min="1" max="10"/>
                </p>
            <div class="col s6">
                <label class="flow-text" for="mensa">Wie findet du die Mensa</label>
            </div>
            <p class="range-field">
                <input style="width: 50%" type="range" id="mensa" min="1" max="10" />
            </p>
            <div class="col s6">
                <label class="flow-text" for="ag">Wie findet du das AG-Angebot an deiner Schule</label>
            </div>
            <p class="range-field">
                <input style="width: 50%" type="range" id="ag" min="1" max="10" />
            </p>
            <div class="col s6">
                <label class="flow-text" for="austattung">Wie findest du die Ausstattung an deiner Schule</label>
            </div>
            <p class="range-field">
                <input style="width: 50%" type="range" id="austattung" min="1" max="10" />
            </p>
            <div class="col s6">
                <label class="flow-text" for="toilet">Wie findest du die Hygiene an deiner Schule</label>
            </div>
            <p class="range-field">
                <input style="width: 50%" type="range" id="toilet" min="1" max="10" />
            </p>
            <div class="col s6">
                <label class="flow-text" for="toilet">Wie findest du die Länge der Schulstunden an deiner Schule</label>
            </div>
            <p class="range-field">
                <input style="width: 50%" type="range" id="length" min="1" max="10" />
            </p>
            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="positivestatements" class="materialize-textarea"></textarea>
                            <label class="flow-text" for="positivestatements">Hast du noch irgendweche Positiven Aspekte zu deiner Schule?</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="negativestatements" class="materialize-textarea"></textarea>
                            <label class="flow-text" for="negativestatements">Hast du noch irgendweche Negativen Aspekte zu deiner Schule?</label>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Absenden
                <i class="material-icons right">send</i>
            </button>
        </div>
    </div>
</form>
</body>
</html>