@extends("layouts.app")

@section("header")
    <h3 class="center-align">Aspekt hinzuf&uuml;gen</h3>
@endsection

@section("main")
    <form class="container" action="{{ action("SchulMasterController@newKeywordEintragen") }}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input name="bezeichnung" id="bezeichnung" type="text" class="validate" required>
                        <label for="bezeichnung">Bezeichnung des Aspekts</label>
                    </div>
                </div>
                <div class="row center">
                    <button class="btn waves-effect waves-light blue" type="submit" name="action">Absenden
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection