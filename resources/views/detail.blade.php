@extends("layouts.app")

@section("css")
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.2.0/leaflet.css" integrity="sha256-LcmP8hlMTofQrGU6W2q3tUnDnDZ1QVraxfMkP060ekM=" crossorigin="anonymous" />
@endsection

@section("header")
    <h3>{{$schule->bezeichnung}}</h3>
    <h4>{{$schule->bezeichnung_kurz}}</h4>
@endsection

@section("main")
    <main>
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s4">
                        <a href="#facts" class="active">Facts</a>
                    </li>
                    <li class="tab col s4">
                        <a href="#quests">Fragebogen</a>
                    </li>
                    <li class="tab col s4">
                        <a href="#redaktionel">Redaktionell</a>
                    </li>

                </ul>
            </div>


            <!--Anfang REDAKTIONELL-->

            <div class="container">
                <div class="row">
                    <div id="redaktionel" class="col s12">
                        @if(isset($redaktionell))
                            <h4 class="card-title">Redaktionelle Inhalte</h4>
                            <p class="flow-text">{{$redaktionell}}</p>
                        @else
                            <p>Es wurde noch nichts im redaktionellen Teil eingetragen. Vielleicht möchtest du ja einige Schüler an deiner Schule dazu motivieren.</p>
                        @endif
                    </div>
                </div>
                <!--Ende REDAKTIONELL-->


                <!-- Anfang FRAGEBOGEN-->

                <!--Ende Durchschnittsbewertung "Sternchen"-->
                <div id="quests" class="col s12 ">
                    @if(count($data) > 0)
                        <div class="collection">
                            @foreach($data as $item)
                                <div class="collection-item">
                                    <p>{{$item["frage"]["name"]}}<span class="right">{{round($item["durchschnitt"], 1)}}/10</span></p>
                                    <div class="progress">
                                        <div class="determinate" style="width: {{$item["durchschnitt"]*10}}%"></div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if(isset($keywords))
                            <div class="row">
                                <h4 class="center-align">Dies bewerten die Schüler besonders:</h4>
                                <table class="highlight centered">
                                    <thead>
                                    <tr>
                                        <th data-field="id">Pro</th>
                                        <th data-field="name">Fact</th>
                                        <th data-field="price">Con</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($keywords as $k=>list($pos, $neg))
                                        <tr>
                                            <td>
                                                <div class="chip green">{{$pos}}</div>
                                            </td>
                                            <td>{{$k}}</td>
                                            <td>
                                                <div class="chip red">{{$neg}}</div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif


                        <div>
                            <h4 class="center-align">Einzelberichte:</h4>

                            <ul class="collapsible" data-collapsible="expandable">
                                @if(count($freitext) > 0)
                                    @foreach($freitext as $r)
                                        @if ($r->bewertung != "")
                                            <li>
                                                <div class="collapsible-header">
                                                    {{--TODO: Link auf neue Seite "reporting"--}}
                                                    <i class="material-icons">announcement</i><p class="truncate">{{$r->bewertung}}
                                                        @if(!Auth::guest() and Auth::user()->type == "school" and Auth::user()->schulID == $schule->id)
                                                            <a class="tooltipped red-text right" data-position="left" data-delay="50" data-tooltip="Einzelbericht melden" href="{{ action("SchulVerwaltungController@einzelberichtMelden", ["id" => $schule->id, "berichtId" => $r->id]) }}"><i class="material-icons">report</i></a></p>
                                                    @endif
                                                </div>
                                                <div class="collapsible-body">
                                                    <p><span>{{$r->bewertung}}</span></p>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                @else
                                    <li>
                                        <div class="collapsible-header active">
                                            <i class="material-icons">announcement</i><p class="truncate">Bisher wurden keine Einzelberichte geschrieben</p>
                                        </div>
                                        <div class="collapsible-body">
                                            <p><span>Bisher wurden keine Einzelberichte geschrieben. Vielleicht möchtest du ja einige Schüler an deiner Schule dazu motivieren.</span></p>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    @else
                        <p>Es wurden noch keine Bewertungen für diese Schule eingetragen. Vielleicht möchtest du ja einige Schüler an deiner Schule dazu motivieren.</p>
                    @endif




                </div>
                <!--Ende Freitext-->

                <!-- Anfang FACTS-->


                <div id="facts" class="col s12">
                    <div class="row">
                        <div class="col s12 m6">
                            <div class="card">
                                <div class=" card-content">
                                    <span class="card-title ">Kontakt</span>
                                    <h6>{{$schule->bezeichnung}}</h6>
                                    <p>{{$schule->details->strasse}}</p>
                                    <p>{{$schule->details->plz}} {{$schule->details->ort}}</p>
                                    <br>
                                    @if($schule->details->homepage!="")<p>Homepage: <a href="{{$schule->details->homepage}}">{{$schule->details->homepage}}</a>@endif
                                    <p>Email: <a href="mailto:{{ $schule->details->mail }}">{{ $schule->details->mail }}</a></p>
                                    @if($schule->details->telnr!="/")<p>Telefon: <a href="tel:{{ $schule->details->telnr }}">{{ $schule->details->telnr }}</a></p>@endif
                                    @if($schule->details->faxnr!="/")<p>Telefax: <a href="tel:{{ $schule->details->faxnr }}">{{ $schule->details->faxnr }}</a></p>@endif

                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="card">
                                <div class="card-content">
                                    <div id="map" style="height:250px; width:auto;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @if(!Auth::guest())
        @if(Auth::user()->schulID == $schule->id and Auth::user()->type == "student" and !$bewertungda)
            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a href="{{ action("SchulDetailController@fragebogen", ["id" => $schule->id]) }}" class="btn-floating btn-large blue tooltipped" data-position="left" data-delay="50" data-tooltip="Trag was ein">
                    <i class="large material-icons">mode_edit</i>
                </a>
            </div>
        @endif
        @if(Auth::user()->schulID == $schule->id and Auth::user()->type == "school")
            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a href="{{ action("SchulVerwaltungController@index", ["id" => $schule->id]) }}" class="btn-floating btn-large blue tooltipped" data-position="left" data-delay="50" data-tooltip="Schulverwaltung">
                    <i class="large material-icons">settings</i>
                </a>
            </div>
        @endif
    @endif
@endsection

@section("js")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.2.0/leaflet.js" integrity="sha256-kdEnCVOWosn3TNsGslxB8ffuKdrZoGQdIdPwh7W1CsE=" crossorigin="anonymous"></script>
    <script>
        var map = null;
        $(document).ready(function () {
            $('ul.tabs').tabs();
            $('.tooltipped').tooltip({
                delay: 50
            });
            $('.collapsible').collapsible({
                accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
            });

            $.get("https://nominatim.openstreetmap.org/search?q=<?php echo $adresse ?>&format=json").done(function (data) {
                map = L.map('map').setView(L.latLng(data[0].lat, data[0].lon), 15);
                L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
                L.marker(L.latLng(data[0].lat, data[0].lon)).addTo(map);
            })
        });
    </script>
@endsection
