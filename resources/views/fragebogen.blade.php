@extends("layouts.app")

@section("header")
    <h3 class="center-align">Bewerte deine Schule</h3>
@endsection

@section("main")
    <form class="container" action="{{ action("SchulDetailController@eintragen", ["id" => $id]) }}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        @foreach($fragenList as $frage)
        <div class="row">
            <div class="col s6">
                <label class="flow-text" for="{{$frage->id}}">{{$frage->name}}</label>
            </div>
            <p class="range-field col s6">
                <input type="range" name="{{$frage->id}}" id="{{$frage->id}}" min="1" max="10" />
            </p>
        </div>
        @endforeach

        <div class="row" style="margin-bottom: 0">
            <div class="input-field col s12 m6">
                <select multiple name="positive[]">
                    <option value="" disabled selected>Auswählen</option>
                    @foreach ($keywordList as $k)
                        <option value="{{$k->id}}">{{$k->bezeichnung}}</option>
                    @endforeach
                </select>
                <label>Positive Aspekte an deiner Schule</label>
            </div>
            <div class="input-field col s12 m6">
                <select multiple name="negative[]">
                    <option value="" disabled selected>Auswählen</option>
                    @foreach ($keywordList as $k)
                        <option value="{{$k->id}}">{{$k->bezeichnung}}</option>
                    @endforeach
                </select>
                <label>Negative Aspekte an deiner Schule</label>
            </div>
        </div>
        <div class="row center">
            <a href="/schule/newkeyword">Aspekt hinzuf&uuml;gen</a>
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
