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
            <button type="submit" class="btn waves-effect waves-light blue" href="/schulen" onclick="Materialize.toast('Abgesendet!', 4000)">Absenden
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
    {{--TODO: Richtige Adresse Eintragen--}}
    <form class="container" action="{{ action("SchulDetailController@eintragen", ["id" => $id]) }}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row center">
            <a class="black-text" href="{{ action("SchulVerwaltungController@index", ["id" => $id]) }}"><h4 class="thin">Schulcode neu generieren</h4></a>
        </div>
        <div class="row center">
            <a class="black-text" href="{{ action("SchulVerwaltungController@index", ["id" => $id]) }}"><h4 class="thin">Schuldaten &auml;ndern</h4></a>
        </div>
        <div class="row">
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea"></textarea>
                    <label for="textarea1">Textarea</label>
                </div>
            </div>
        </div>
        <div class="row center">
            <button type="submit" class="btn waves-effect waves-light blue" href="/schulen" onclick="Materialize.toast('Abgesendet!', 4000)">Absenden
                <i class="material-icons right">send</i>
            </button>
        </div>
        <div class="row center">
            <a href="/schule/{{$id}}" class="btn-flat">Zurück</a>
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
