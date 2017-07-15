@extends("layouts.app")

@section("header")
    <h3 class="center-align">Schul-O-Mat</h3>
    <h4 class="center-align thin">Neue Schule eintragen</h4>
@endsection

@section("main")
    {{--TODO: Richtige Adresse Eintragen--}}
    <form class="container" action="" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
            <div class="input-field col s12">
                <select name="bundesland">
                    {{-- TODO: Bundesländer aus DB --}}
                    <option value="" disabled>Bundesland ausw&auml;hlen</option>
                    <option value="ID">BUNDESLAND</option>
                </select>
                <label>Bundesland</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select name="schulform">
                    {{--TODO: Schulformen aus DB--}}
                    <option value="" disabled>Schulform ausw&auml;hlen</option>
                    <option value="Schulform">SCHULFORM</option>
                </select>
                <label>Schulform</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="bezeichnung" type="text" class="validate" required>
                <label for="bezeichnung">Bezeichnung</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="kurzbezeichnung" type="text" class="validate" required>
                <label for=kurzbezeichnung">Kurzbezeichnung</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="strasse" type="text" class="validate" required>
                <label for="strasse">Stra&szlig;e</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="ort" type="text" class="validate" required>
                <label for="ort">Ort</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="plz" type="text" class="validate" required>
                <label for="plz">Postleitzahl</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="homepage" type="text" class="validate" required>
                <label for="homepage">Homepage</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="mail" type="text" class="validate" required>
                <label for="mail">E-Mail</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="telefon" type="text" class="validate" required>
                <label for="telefon">Telefon</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
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
            <a href="{{ action("IndexController@index") }}" class="btn-flat">Zurück</a>
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
