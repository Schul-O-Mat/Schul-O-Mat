<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v1.0.0-rc.1/leaflet.css" />
    <link rel="stylesheet" href="/sass/app.css">
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
                <li><a href="/schulen"><i class="material-icons">arrow_back</i></a></li>
            </ul>

        </div>
    </nav>
    <header class="center-align">
        <h3>{{$schule->bezeichnung->schulbez1}}</h3>
        <h3>{{$schule->bezeichnung->schulbez2}}</h3>
        <h3>{{$schule->bezeichnung->schulbez3}}</h3>
        <h4>{{$schule->bezeichnung->kurzbez}}</h4>
    </header>
    <main>
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3">
                        <a href="#facts" class="active">Facts</a>
                    </li>
                    <li class="tab col s3">
                        <a href="#quests">Fragebogen</a>
                    </li>
                    <li class="tab col s3">
                        <a href="#redaktionel">Redaktionell</a>
                    </li>

                </ul>
            </div>

            <div id="redaktionel" class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Redaktionelle Inhalte</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore earum at laudantium quae, laboriosam, quaerat consequuntur doloremque atque unde eaque deleniti fuga beatae delectus eligendi nobis nisi veritatis similique facere?</p>
                    </div>
                    <div class="card-action">
                        <a href="" class="btn">Unbelivable</a>
                    </div>
                </div>
            </div>
            <div id="quests" class="col s12 ">
                <div class="collection">
                    <div class="collection-item">
                        <p>Wie findest du deine Schule im Allgemeinen?<span class="right">{{$durchschnitt[0]}}/10</span></p>
                        <div class="progress">
                            <div class="determinate" style="width: {{$durchschnitt[0]*10}}%"></div>

                        </div>
                    </div>
                    <div class="collection-item">
                        <p>Wie findest du die Schulmensa?<span class="right">7/10</span></p>
                        <div class="progress">
                            <div class="determinate" style="width: 70%"></div>

                        </div>
                    </div>
                    <div class="collection-item">
                        <p>Wie findest du die AGs?<span class="right">7/10</span></p>
                        <div class="progress">
                            <div class="determinate" style="width: 70%"></div>

                        </div>
                    </div>
                    <div class="collection-item">
                        <p>Wie findest du die Austattung der Schule?<span class="right">7/10</span></p>
                        <div class="progress">
                            <div class="determinate" style="width: 70%"></div>

                        </div>
                    </div>
                    <div class="collection-item">
                        <p>Wie findest du die Scheißhäuser?<span class="right">7/10</span></p>
                        <div class="progress">
                            <div class="determinate" style="width: 70%"></div>

                        </div>
                    </div>
                    <div class="collection-item">
                        <p>Wie findest du die Länge der Schulstunden?<span class="right">7/10</span></p>
                        <div class="progress">
                            <div class="determinate" style="width: 70%"></div>

                        </div>
                    </div>
                    <div class="collection-item">
                        <p>Wie findest du die Zeit des Schulbeginns?<span class="right">7/10</span></p>
                        <div class="progress">
                            <div class="determinate" style="width: 70%"></div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 l6">
                            <ul class="collection with-header">
                                <li class="collection-header">
                                    <h4>Positive Aspekte</h4></li>
                                <li class="collection-item">
                                    <div>Alvin<span class="right">4</span></div>
                                </li>
                                <li class="collection-item">
                                    <div>Alvin<span class="right">4</span></div>
                                </li>
                                <li class="collection-item">
                                    <div>Alvin<span class="right">4</span></div>
                                </li>
                                <li class="collection-item">
                                    <div>Alvin<span class="right">4</span></div>
                                </li>
                            </ul>
                        </div>
                        <div class="col s12 l6">
                            <ul class="collection with-header">
                                <li class="collection-header">
                                    <h4>Negative Aspekte</h4></li>
                                <li class="collection-item">
                                    <div>Alvin<span class="right">4</span></div>
                                </li>
                                <li class="collection-item">
                                    <div>Alvin<span class="right">4</span></div>
                                </li>
                                <li class="collection-item">
                                    <div>Alvin<span class="right">4</span></div>
                                </li>
                                <li class="collection-item">
                                    <div>Alvin<span class="right">4</span></div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div>
                        <p>Einzelberichte:</p>
                        <ul class="collapsible">
                            <li>
                                <div class="collapsible-header">Hier krasser Pfeil nach unten.</div>
                                <div class="collapsible-body">
                                    <div class="collection">
                                        <div class="collection-item">Boah, was ein geiles Ding :3</div>
                                        <div class="collection-item">Voll die Opfah Lehra</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="facts" class="col s12">
                <div class="row">
                    <div class="col s12 m6">
                        <div class="card">
                            <div class=" card-content">
                                <span class="card-title ">Kontakt</span>
                                <h6>{{$schule->bezeichnung->schulbez1}}</h6>
                                <p>{{$schule->adresse->strasse}}</p>
                                <p>{{$schule->adresse->plz}} {{$schule->adresse->ort}}</p>
                                <br>
                                <p>Email: <a href="mailto:{{ $schule->kontakt->mail }}">{{ $schule->kontakt->mail }}</a></p>
                                <p>Telefon: <a href="tel:{{ $schule->kontakt->telefonnr }}">{{ $schule->kontakt->telefonnr }}</a></p>
                                <p>Telefax: <a href="tel:{{ $schule->kontakt->faxnr }}">{{ $schule->kontakt->faxnr }}</a></p>

                            </div>
                            <div class="card-action ">
                                <a href="/schule/{{$schule->schulnr}}/karte">Öffne mit Maps</a>
                                <a href="# ">Irgendwas</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    </main>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript " src="https://code.jquery.com/jquery-2.1.1.min.js "></script>
    <script type="text/javascript " src="/js/bin/materialize.js "></script>
    <script type="text/javascript" src="http://cdn.leafletjs.com/leaflet/v1.0.0-rc.1/leaflet.js"></script>
    <script>
        $(document).ready(function () {
            $('ul.tabs').tabs();
        });
        $(document).ready(function () {
            $('.collapsible').collapsible({
                accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
            });
        });
    </script>
    <!--
    <script type="text/javascript">
    var convertedValues = gk2geo({
        {
            $hochwert
        }
    }, {
        {
            $rechtswert
        }
    });

    function addMarker(lat, lng, description) {
        L.marker([lat, lng]).addTo(map)
            .bindPopup(description)
            .openPopup();
    };

    function openMap(lat, lng) {
        var map = L.map('map').setView([lat, lng], 13);
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(map);
    };
    openMap(convertedValues[0], convertedValues[1]);
    addMarker(convertedValues[0], convertedValues[1], "Die Schule!")
</script>
-->
</body>

</html>