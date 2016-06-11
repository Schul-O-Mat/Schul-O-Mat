<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

    <link rel="stylesheet" href="../assets/sass/app.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf8">
    <title>Schul-O-Mat | Details</title>
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
    <header class="center-align">
        <h1>Steinbart Gymnasium</h1>
        <h2>Duisburg</h2>
    </header>
    <main>
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3">
                        <a class="active" href="#facts">Facts</a>
                    </li>
                    <li class="tab col s3">
                        <a href="#questions">Fragebogen</a>
                    </li>
                    <li class="tab col s3">
                        <a href="#redaction">Redaktionell</a>
                    </li>

                </ul>
            </div>

            <div id="facts" class="col s12">
                <div class="row">
                    <div class="col s12 m6">
                        <div class="card">
                            <div class=" card-content">
                                <span class="card-title ">Kontakt</span>
                                <h6>Steinbart Gymnasium</h6>
                                <p>Realschulstraße 45</p>
                                <p>47051 Duisburg</p>
                                <br>
                                <p>Email: <a href=" ">troll@trololol.troll</a></p>
                                <p>Telefon: <a href=" ">0203-123456</a></p>
                                <p>Telefax: <a href=" ">0203-1234567</a></p>

                            </div>
                            <div class="card-action ">
                                <a href="# ">Öffne mit Maps</a>
                                <a href="# ">Irgendwas</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 "></div>
                </div>
            </div>
            <div id="questions " class="col s12 ">
                <div class="collection">
                    <div class="collection-item">
                        <p>Wie findest du deine Schule?</p>
                        <div class="progress">
                            <div class="determinate" style="width: 70%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="redaction " class="col s12 ">Redaktionelle Inhalte...</div>

        </div>
    </main>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript " src="https://code.jquery.com/jquery-2.1.1.min.js "></script>
    <script type="text/javascript " src="../assets/js/bin/materialize.js "></script>
    <script>
        $(document).ready(function () {
            $('ul.tabs').tabs();
        });
    </script>
</body>

</html>