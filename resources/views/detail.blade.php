@extends("layouts.app")

@section("header")
  <h3>{{$schule->bezeichnung->schulbez1}}</h3>
  <h3>{{$schule->bezeichnung->schulbez2}}</h3>
  <h3>{{$schule->bezeichnung->schulbez3}}</h3>
  <h4>{{$schule->bezeichnung->kurzbez}}</h4>
@endsection

@section("main")
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
                    @if(isset($durchschnitt))
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
                            <p>Wie findest du die Toiletten an deiner Schule?<span class="right">{{round($durchschnitt[4], 1)}}/10</span></p>
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
                        @else
                            <p>Es wurden noch keine Bewertungen für diese Schule eingetragen. Vielleicht möchtest du ja einige Schüler an deiner Schule dazu motivieren.</p>
                        @endif
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
                    @else
                      <p>Es wurden noch keine Bewertungen für diese Schule eingetragen. Vielleicht möchtest du ja einige Schüler an deiner Schule dazu motivieren.</p>
                    @endif @if(isset($reviews))
                    <div>
                        <h4 class="center-align">Einzelberichte:</h4>

                        <ul class="collapsible" data-collapsible="expandable">

                            @foreach($reviews as $r)
                                @if (!$r->freitext == "")
                                <li>
                                <div class="collapsible-header" class="">
                                    <i class="material-icons">announcement</i><p class="truncate">{{$r->freitext}}</p>
                                </div>
                                <div class="collapsible-body">
                                    <p><span>{{$r->freitext}}</span></p>
                                </div>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    @endif

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
                                    @if($schule->kontakt->homepage!="")<p>Homepage: <a href="{{$schule->kontakt->homepage}}">{{$schule->kontakt->homepage}}</a>@endif
                                    <p>Email: <a href="mailto:{{ $schule->kontakt->mail }}">{{ $schule->kontakt->mail }}</a></p>
                                    @if($schule->kontakt->telefonnr!="/")<p>Telefon: <a href="tel:{{ $schule->kontakt->telefonnr }}">{{ $schule->kontakt->telefonnr }}</a></p>@endif
                                    @if($schule->kontakt->faxnr!="/")<p>Telefax: <a href="tel:{{ $schule->kontakt->faxnr }}">{{ $schule->kontakt->faxnr }}</a></p>@endif

                                </div>
                                <div class="card-action ">
                                    <a href="/schule/{{$schule->schulnr}}/karte">Öffne mit Maps</a>
                                    @if($schule->kontakt->homepage!="")<a href="{{$schule->kontakt->homepage}}">Zur Website</a>@endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    @if(!Auth::guest())
      @if(Auth::user()->schulID == $schulID && !$bewertungda)
    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a href="/schule/{{$schule->schulnr}}/eintragen" class="btn-floating btn-large blue tooltipped" data-position="left" data-delay="50" data-tooltip="Trag was ein">
            <i class="large material-icons">mode_edit</i>
        </a>
    </div>
      @endif
    @endif
@endsection

@section("js")
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
@endsection
