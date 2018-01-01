@extends("layouts.app")

@section("header")
    <h3 class="center-align">Schulverwaltung</h3>
    <h4 class="center-align thin">{{ $bezeichnung }}</h4>
@endsection

@section("main")
    {{--TODO: Richtige Adresse Eintragen--}}
    <form class="container" action="{{ action("SchulVerwaltungController@datenAendern", ["id" => $id]) }}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
            <div class="input-field col s12">
                <select name="bundesland">
                    <option value="" disabled selected>Bundesland ausw&auml;hlen</option>
                    @foreach($bundeslaender as $bl)
                        <option value="{{$bl->id}}" @if ($bl->id == $schule->bundeslandID) {{"selected"}} @endif>{{$bl->name}}</option>
                    @endforeach
                </select>
                <label>Bundesland</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select name="schulform">
                    <option value="" disabled>Schulform ausw&auml;hlen</option>
                    @foreach($schulformen as $sf)
                        <option value="{{$sf->id}}" @if ($sf->id == $schule->schulformID) {{"selected"}} @endif >{{$sf->name}}</option>
                    @endforeach
                </select>
                <label>Schulform</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input name="bezeichnung" type="text" class="validate" value="{{$schule->bezeichnung}}">
                <label for="bezeichnung">Bezeichnung</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input name="kurzbezeichnung" type="text" class="validate" value="{{$schule->bezeichnung_kurz}}">
                <label for=kurzbezeichnung">Kurzbezeichnung</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input name="strasse" type="text" class="validate" value="{{$schule->details->strasse}}">
                <label for="strasse">Stra&szlig;e</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input name="ort" type="text" class="validate" value="{{$schule->details->ort}}">
                <label for="ort">Ort</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input name="plz" type="text" class="validate" value="{{$schule->details->plz}}">
                <label for="plz">Postleitzahl</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input name="homepage" type="text" class="validate" value="{{$schule->details->homepage}}">
                <label for="homepage">Homepage</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input name="mail" type="text" class="validate" value="{{$schule->details->mail}}">
                <label for="mail">E-Mail</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input name="telnr" type="text" class="validate" value="{{$schule->details->telnr}}">
                <label for="telnr">Telefon</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input name="faxnr" type="text" class="validate" value="{{$schule->details->faxnr}}">
                <label for="faxnr">Fax</label>
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
