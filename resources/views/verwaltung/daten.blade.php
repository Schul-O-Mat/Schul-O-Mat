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
                    <option value="" disabled selected>Bundesland ausw&auml;hlen</option>
                    @foreach($bundeslaender as $bl)
                        <option value="{{$bl->id}}">{{$bl->name}}</option>
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
                        <option value="{{$sf->id}}">{{$sf->name}}</option>
                    @endforeach
                </select>
                <label>Schulform</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="bezeichnung" type="text" class="validate" value="{{$schule->bezeichnung}}">
                <label for="bezeichnung">Bezeichnung</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="kurzbezeichnung" type="text" class="validate" value="{{$schule->bezeichnung_kurz}}">
                <label for=kurzbezeichnung">Kurzbezeichnung</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="strasse" type="text" class="validate" value="{{$schule->details->strasse}}">
                <label for="strasse">Stra&szlig;e</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="ort" type="text" class="validate" value="{{$schule->details->ort}}">
                <label for="ort">Ort</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="plz" type="text" class="validate" value="{{$schule->details->plz}}">
                <label for="plz">Postleitzahl</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="homepage" type="text" class="validate" value="{{$schule->details->homepage}}">
                <label for="homepage">Homepage</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="mail" type="text" class="validate" value="{{$schule->details->mail}}">
                <label for="mail">E-Mail</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="telefon" type="text" class="validate" value="{{$schule->details->telnr}}">
                <label for="telefon">Telefon</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="fax" type="text" class="validate" value="{{$schule->details->faxnr}}">
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
