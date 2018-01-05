@extends("layouts.app")

@section("header")
    <h3 class="center-align">Schulverwaltung</h3>
    <h4 class="center-align thin">{{ $bezeichnung }}</h4>
@endsection

@section("main")
    {{--TODO: Richtige Adresse Eintragen--}}
    <form class="container" action="{{ action("SchulDetailController@eintragen", ["id" => $id]) }}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
            <div class="input-field col s12">
                <select multiple>
                    <option value="" disabled selected>Keywords ausw&auml;hlen</option>
                    @foreach ($keywords as $keyword)
                        @if ($keyword->changeable)
                            <option value="{{ $keyword->id }}">{{ $keyword->bezeichnung }}</option>
                        @endif
                    @endforeach
                </select>
                <label>Keywords ausw&auml;hlen, die deaktiviert werden sollen</label>
            </div>
        </div>
        <div class="row center">
            <button type="submit" class="btn-flat waves-effect waves-light" href="/schulen" onclick="Materialize.toast('Keywords geändert!', 4000)">Keywords &auml;ndern
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
    {{--TODO: Richtige Addresse eintragen--}}
    <form class="container" action="{{ action("SchulDetailController@eintragen", ["id" => $id]) }}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
            <div class="input-field col s12">
                <select multiple>
                    <option value="" disabled selected>Fragen ausw&auml;hlen</option>
                    @foreach ($fragen as $frage)
                        <option value="{{ $frage->id }}">{{ $frage->bezeichnung }}</option>
                    @endforeach
                </select>
                <label>Fragen ausw&auml;hlen, die deaktiviert werden sollen</label>
            </div>
        </div>
        <div class="row center">
            <button type="submit" class="btn-flat waves-effect waves-light" href="/schulen" onclick="Materialize.toast('Fragen geändert!', 4000)">Fragen &auml;ndern
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>

    {{--TODO: Richtige Adresse Eintragen--}}
    <form class="container" action="{{ action("SchulDetailController@eintragen", ["id" => $id]) }}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="redaktionstext" class="materialize-textarea"></textarea>
                    <label for="readaktionstext">Redaktionstext</label>
                </div>
            </div>
        </div>
        <div class="row center">
            <button type="submit" class="btn-flat waves-effect waves-light" href="/schulen" onclick="Materialize.toast('Redaktionstext geändert!', 4000)">Redaktionstext &auml;ndern
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
    <div class="row center">
        <h4 class="thin">Schulcode: <span style="font-weight: 300">{{ $schulcode }}</span></h4>
    </div>
    <div class="row center">
        <a class="black-text" href="{{ action("SchulVerwaltungController@recreateSchulcode", ["id" => $id]) }}"><h4 class="thin">Schulcode neu generieren</h4></a>
    </div>
    <div class="row center">
        <a class="black-text" href="{{ action("SchulVerwaltungController@optInSchulcode", ["id" => $id]) }}"><h4 class="thin">Schulcode Opt-In</h4></a>
    </div>
    <div class="row center">
        <a class="black-text" href="{{ action("SchulVerwaltungController@daten", ["id" => $id]) }}"><h4 class="thin">Schuldaten &auml;ndern</h4></a>
    </div>
    <div class="row center">
        <a href="/schule/{{$id}}" class="btn-flat">Zur&uuml;ck zur Schule</a>
    </div>
@endsection

@section("js")
    <script>
        $(document).ready(function () {
            $('select').material_select();
            var currentURL = new URL(window.location.href)
            if(currentURL.searchParams.get('action') === 'schulcode') {
                Materialize.toast('Der Schulcode wurde geändert!', 5000)
            }
        });
    </script>
@endsection
