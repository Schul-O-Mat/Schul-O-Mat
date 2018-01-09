@extends("layouts.app")
@section("header")
    <h3 class="center-align">Schulverwaltung</h3>
    <h4 class="center-align thin">{{ $schule->bezeichnung_kurz }}</h4>
    <h5 class="center-align">Einzelbericht melden</h5>
@endsection
@section("main")
    <div class="container">
        <p class="z-depth-1 flow-text" style="padding: 10px">{{ $bericht->bewertung }}</p>
        <form action="">
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="begruendung" name="begruendung" class="materialize-textarea"></textarea>
                    <label for="begruendung">Begr&uuml;ndung</label>
                </div>
            </div>
            <div class="row center-align">
                <button class="btn waves-effect waves-light blue" type="submit" name="action">Absenden
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>
@endsection
