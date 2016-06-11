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


            <!--Anfang REDAKTIONELL-->


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

            <!--Ende REDAKTIONELL-->


            <!-- Anfang FRAGEBOGEN-->

            <!--Ende Durchschnittsbewertung "Sternchen"-->

            <div id="quests" class="col s12 ">
                <div class="collection">
                    <div class="collection-item">
                        <p>Wie findest du deine Schule im Allgemeinen?<span class="right">{{round($durchschnitt[0], 1)}}/10</span></p>
                        <div class="progress">
                            <div class="determinate" style="width: {{$durchschnitt[0]*10}}%"></div>

                        </div>
                    </div>
                    <div class="collection-item">
                        <p>Wie findest du die Schulmensa?<span class="right">{{round($durchschnitt[1], 1)}}/10</span></p>
                        <div class="progress">
                            <div class="determinate" style="width: {{$durchschnitt[1]*10}}%"></div>

                        </div>
                    </div>
                    <div class="collection-item">
                        <p>Wie findest du die AGs?<span class="right">{{round($durchschnitt[2], 1)}}/10</span></p>
                        <div class="progress">
                            <div class="determinate" style="width: {{$durchschnitt[2]*10}}%"></div>

                        </div>
                    </div>
                    <div class="collection-item">
                        <p>Wie findest du die Austattung der Schule?<span class="right">{{round($durchschnitt[3], 1)}}/10</span></p>
                        <div class="progress">
                            <div class="determinate" style="width: {{$durchschnitt[3]*10}}%"></div>

                        </div>
                    </div>
                    <div class="collection-item">
                        <p>Wie findest du die Scheißhäuser?<span class="right">{{round($durchschnitt[4], 1)}}/10</span></p>
                        <div class="progress">
                            <div class="determinate" style="width: {{$durchschnitt[4]*10}}%"></div>

                        </div>
                    </div>
                    <div class="collection-item">
                        <p>Wie findest du die Länge der Schulstunden?<span class="right">{{round($durchschnitt[5], 1)}}/10</span></p>
                        <div class="progress">
                            <div class="determinate" style="width: {{$durchschnitt[5]*10}}%"></div>

                        </div>
                    </div>
                    <div class="collection-item">
                        <p>Wie findest du die Zeit des Schulbeginns?<span class="right">{{round($durchschnitt[6], 1)}}/10</span></p>
                        <div class="progress">
                            <div class="determinate" style="width: {{$durchschnitt[6]*10}}%"></div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <h4 class="center-align">Dies Bewerten die Schüler Besonders:</h4>
                    <table class="highlight centered">
                        <thead>
                            <tr>
                                <th data-field="id">Pro</th>
                                <th data-field="name">Fact</th>
                                <th data-field="price">Con</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <div class="chip green">6</div>
                                </td>
                                <td>Mensaessen</td>
                                <td>
                                    <div class="chip red">2</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="chip green">6</div>
                                </td>
                                <td>Lehrer</td>
                                <td>
                                    <div class="chip red">2</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="chip green">6</div>
                                </td>
                                <td>Informatikunterricht</td>
                                <td>
                                    <div class="chip red">2</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="chip green">6</div>
                                </td>
                                <td>Schuhgröße</td>
                                <td>
                                    <div class="chip red">2</div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div>
                    <h4 class="center-align">Einzelberichte:</h4>

                    <ul class="collapsible" data-collapsible="expandable">
                        <li>
                            <div class="collapsible-header"><i class="material-icons">filter_drama</i>Ey, so ein cooler Kommentar</div>
                            <div class="collapsible-body">
                                <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis inventore perspiciatis architecto dolores sequi vel quam expedita nisi ipsa molestias ad illo, officia tempora ipsam, beatae hic excepturi omnis reiciendis.</span>
                                    <span>Aut nam ea, dignissimos aperiam animi soluta esse ipsum sit voluptates, fugiat maxime ducimus illum, dolores quo numquam beatae ullam nihil accusantium rerum facere quidem quasi. Laborum, sed tempore ut.</span>
                                    <span>Officiis excepturi distinctio magnam in, adipisci enim impedit vitae culpa quam neque qui reiciendis eveniet. Voluptate commodi, ducimus cum amet nesciunt dignissimos distinctio a repellat molestias similique unde autem dolores!</span>
                                    <span>Tenetur deleniti asperiores delectus odit animi quam iure distinctio aliquam dicta facilis, possimus accusamus optio enim nam perspiciatis! Perspiciatis rem, dolorem accusantium quibusdam sit consequuntur illum assumenda error beatae reiciendis.</span></p>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header"><i class="material-icons">place</i>Ey, so ein cooler Kommentar</div>
                            <div class="collapsible-body">
                                <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, illo quibusdam itaque harum tempore, officiis culpa quis voluptatem laborum voluptates sit totam expedita error atque distinctio nostrum necessitatibus quidem fugit.</span>
                                    <span>Libero ea dolore, ratione minima sunt fugit porro et earum, fuga beatae nulla non. Autem mollitia asperiores ullam modi, expedita amet consequatur sunt quam, odit, laudantium nihil! Modi reiciendis, perspiciatis.</span>
                                    <span>Sint nam voluptates nulla ab perspiciatis quos, incidunt architecto distinctio quasi laudantium ad reprehenderit, dolores reiciendis eligendi. Inventore beatae quae optio sapiente. Cum alias debitis corrupti rem quis, qui magni.</span>
                                    <span>Illo maxime totam veritatis dolorem, beatae aliquam aperiam ut, sapiente eum explicabo, inventore provident tenetur. Nisi eos cumque consequuntur natus ullam quasi omnis. Eum repellat quidem sed ipsam quae laudantium!</span></p>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header"><i class="material-icons">whatshot</i>Ey, so ein cooler Kommentar</div>
                            <div class="collapsible-body">
                                <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae debitis nihil harum, iure, quaerat sunt enim ducimus quis rem ut cumque architecto minima. Quo dolore temporibus itaque quaerat ullam, recusandae.</span>
                                    <span>Incidunt praesentium rem doloribus distinctio, facilis cum id error quas? Quidem magnam necessitatibus facilis blanditiis enim tempora laborum. Recusandae vel magnam rem. Cum minus sequi ab consectetur pariatur animi, cupiditate.</span>
                                    <span>Ipsa, molestiae veniam nesciunt excepturi vero temporibus pariatur beatae atque asperiores quos cum ipsum fuga dignissimos sed praesentium aspernatur iusto optio iste quo? Eveniet obcaecati quam voluptatem ad, iste cupiditate.</span>
                                    <span>Veniam ex porro, illo pariatur unde ea exercitationem possimus quisquam nisi consectetur quod ab nulla magni, animi cumque accusamus itaque quasi architecto fugiat optio impedit iure rem aliquam? Aperiam, atque.</span></p>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>

            <!--Ende Freitext-->

            <!-- Anfang FRAGEBOGEN-->


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
    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a href="/schule/{{$schule}}/eintragen" class="btn-floating btn-large blue tooltipped" data-position="left" data-delay="50" data-tooltip="Trag was ein">
            <i class="large material-icons">mode_edit</i>
        </a>
    </div>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript " src="https://code.jquery.com/jquery-2.1.1.min.js "></script>
    <script type="text/javascript " src="/js/bin/materialize.js "></script>
    <script type="text/javascript" src="http://cdn.leafletjs.com/leaflet/v1.0.0-rc.1/leaflet.js"></script>
    <script>
        $(document).ready(function () {
            $('ul.tabs').tabs();
            $('.tooltipped').tooltip({
                delay: 50
            });
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