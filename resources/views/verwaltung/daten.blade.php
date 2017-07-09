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
                <select name="bundesland">
                    <option value="" disabled>Bundesland ausw&auml;hlen</option>
                    {{--TODO: Bundesländer aus DB--}}
                    <option value="ID">BUNDESLAND</option>
                </select>
                <label>Bundesland</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select name="schulform">
                    <option value="" disabled>Schulform ausw&auml;hlen</option>
                    {{--TODO: Schulformen aus DB--}}
                    <option value="Schulform">SCHULFORM</option>
                </select>
                <label>Schulform</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                {{--TODO: Bezeichnung aus DB --}}
                <input id="bezeichnung" type="text" class="validate">
                <label for="bezeichnung">Bezeichnung</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                {{--TODO: Kurzbezeichnung aus DB --}}
                <input id="kurzbezeichnung" type="text" class="validate">
                <label for=kurzbezeichnung">Kurzbezeichnung</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                {{--TODO: Straße aus DB --}}
                <input id="strasse" type="text" class="validate">
                <label for="strasse">Stra&szlig;e</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                {{--TODO: Ort aus DB --}}
                <input id="ort" type="text" class="validate">
                <label for="ort">Ort</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                {{--TODO: PLZ aus DB --}}
                <input id="plz" type="text" class="validate">
                <label for="plz">Postleitzahl</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                {{--TODO: Homepage aus DB --}}
                <input id="homepage" type="text" class="validate">
                <label for="homepage">Homepage</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                {{--TODO: Mail aus DB --}}
                <input id="mail" type="text" class="validate">
                <label for="mail">E-Mail</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                {{--TODO: Telefon aus DB --}}
                <input id="telefon" type="text" class="validate">
                <label for="telefon">Telefon</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                {{--TODO: Fax aus DB --}}
                <input id="fax" type="text" class="validate">
                <label for="fax">Fax</label>
            </div>
        </div>
        <div class="row center">
            <button type="submit" class="btn waves-effect waves-light blue" onclick="Materialize.toast('Abgesendet!', 4000)">Absenden
                <i class="material-icons right">send</i>
            </button>
        </div>
        <div class="row center">
            <a href="{{ action("SchulVerwaltungController@index", ["id" => $id]) }}" class="btn-flat">Zurück</a>
        </div>
    </form>
@endsection
@section("js")
    <script>
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
@endsection
