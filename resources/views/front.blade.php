@extends("layouts.app")

@section("header")
  <h1>Schul-O-Mat</h1>
  <h2>Finde die Schule, die zu <span class="blue-text">dir </span><a href="{{ action("SchulMasterController@redirect") }}"class="black-text">passt</a>!</h2>
@endsection

@section("main")
  <main class="container">
      <div class="row">
          <div class="col s12">
              <p class="flow-text">Möchtest du etwas über eine Schule erfahren?</p>
              <div class="row center-align">
                  <a href="{{ action("SchulMasterController@redirect") }}" class="btn large blue">Schau dir alle Schulen an</a>
                  <a href="{{ action("SchulMasterController@redirect") }}" class="btn large blue">Suche gezielt nach einer Schule</a>
              </div>
          </div>
          <div class="col s12">
              <p class="flow-text">Möchtest du etwas beitragen?</p>
              <div class="row center-align">
                  @if(Auth::guest())
                  <a href="{{ action("Auth\AuthController@getLogin") }}" class="btn large blue">Anmelden</a>
                  @else
                  <a class="btn large blue">Du bist eingeloggt als {{Auth::user()->name}}!</a> @endif
              </div>
              <p id="whatissomat" class="z-depth-1 flow-text">Was ist der Schul-O-Mat? Ihr kennt das Problem: Man ist auf einem Tag der offenen Tür, um sich eine Meinung über eine Schule zu bilden. Aber da die Schule sich nur von der besten Seite präsentiert, ist man am Ende nicht wirklich schlauer geworden, da man nur ein einseitiges Bild hat. Das ändert der Schul-O-Mat! Hier können sich Schüler anmelden, ihre Schule bewerten und andere Bewertungen anschauen. Zusätzlich kann sich die Schule selber präsentieren. So kannst du dir verschiedene Meinungen anhören.
              </p>
          </div>
      </div>
  </main>
@endsection
