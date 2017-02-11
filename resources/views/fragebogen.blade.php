@extends("layouts.app")

@section("header")
  <h3 class="center-align">Bewerte deine Schule</h3>
@endsection

@section("main")
  <form class="container" action="{{ action("SchulDetailController@eintragen", ["id" => $id]) }}" method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="row">

          <div class="col s6">
              <label class="flow-text" for="schoolgeneral">Wie findest du deine Schule?</label>
          </div>
          <p class="range-field col s6">
              <input type="range" name="schoolgeneral" id="schoolgeneral" min="1" max="10" />
          </p>
      </div>
      <div class="row">
          <div class="col s6">
              <label class="flow-text" for="mensa">Wie findet du die Mensa?</label>
          </div>
          <p class="range-field col s6">
              <input type="range" name="mensa" id="mensa" min="1" max="10" />
          </p>
      </div>
      <div class="row">
          <div class="col s6">
              <label class="flow-text" for="ag">Wie findet du das AG-Angebot an deiner Schule?</label>
          </div>
          <p class="range-field col s6">
              <input type="range" name="ag" id="ag" min="1" max="10" />
          </p>
      </div>
      <div class="row">
          <div class="col s6">
              <label class="flow-text" for="austattung">Wie findest du die Ausstattung an deiner Schule?</label>
          </div>
          <p class="range-field col s6">
              <input type="range" name="austattung" id="ausstattung" min="1" max="10" />
          </p>
      </div>
      <div class="row">
          <div class="col s6">
              <label class="flow-text" for="toilet">Wie findest du die Hygiene an deiner Schule?</label>
          </div>
          <p class="range-field col s6">
              <input type="range" name="toilet" id="toilet" min="1" max="10" />
          </p>
      </div>
      <div class="row">
          <div class="col s6">
              <label class="flow-text" for="length">Wie findest du die Länge der Schulstunden an deiner Schule?</label>
          </div>
          <p class="range-field col s6">
              <input type="range" name="length" id="length" min="1" max="10" />
          </p>
      </div>
      <div class="row">
          <div class="col s6">
              <label class="flow-text" for="time">Wie findest du die Zeiten des Schulbeginns?</label>
          </div>
          <p class="range-field col s6">
              <input type="range" name="time" id="time" min="1" max="10" />
          </p>
      </div>

      <div class="row">
          <div class="input-field col s12 m6">
              <select multiple name="positive[]" required>
                  <option value="" disabled selected>Auswählen</option>
                  @foreach ($keywords as $k)
                  <option value="{{$k->id}}">{{$k->bezeichnung}}</option>
                  @endforeach
              </select>
              <label>Positive Aspekte an deiner Schule</label>
          </div>
          <div class="input-field col s12 m6">
              <select name="negative[]" multiple required>
                  <option value="" disabled selected>Auswählen</option>
                  @foreach ($keywords as $k)
                  <option value="{{$k->id}}">{{$k->bezeichnung}}</option>
                  @endforeach
              </select>
              <label>Negative Aspekte an deiner Schule</label>
          </div>
      </div>
      <div class="row">
          <div class="col s12">
              <div class="row">
                  <div class="input-field col s12">
                      <i class="material-icons prefix">mode_edit</i>
                      <textarea name="freitext" id="freitext" class="materialize-textarea"></textarea>
                      <label for="freitext">Gib deinen Senf dazu!</label>
                  </div>
              </div>
          </div>
      </div>
      <div class="row center-align">
          <a href="/schule/{{$id}}" class="btn-flat">Zurück</a>
          <!--
          <button class="btn waves-effect waves-light blue" type="submit" name="action">Absenden
              <i class="material-icons right">send</i>
          </button>
-->
          <button type="submit" class="btn waves-effect waves-light blue" href="/schulen" onclick="Materialize.toast('Data successfully saved!', 4000)">Absenden
              <i class="material-icons right">send</i>
          </button>
      </div>
  </form>
@endsection

@section("js")
  <script>
      $(document).ready(function () {
          $('select').material_select();
      });
  </script>
@endsection
