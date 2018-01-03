@extends("layouts.app")

@section("header")
    <h3 class="center-align">Dein Account - {{ Auth::user()->name }}</h3>
@endsection

@section("main")
    <form class="container" action="{{ action("UserVerwaltungController@changeData") }}" id="changedata-form" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
            <div class="input-field col s12">
                <input id="vorname" name="vorname" type="text" class="validate" placeholder="{{ $currentUser->vorname }}">
                <label for="vorname">Vorname</label>
            </div>
            <div class="input-field col s12">
                <input id="nachname" name="nachname" type="text" class="validate" placeholder="{{ $currentUser->nachname }}">
                <label for="nachname">Nachname</label>
            </div>
            <div class="input-field col s12">
                <input id="username" name="username" type="text" class="validate" placeholder="{{ $currentUser->name }}">
                <label for="username">Username</label>
            </div>
            <div class="input-field col s12">
                <input id="email" name="email" type="email" class="validate" placeholder="{{ $currentUser->email }}">
                <label for="email">E-Mail</label>
            </div>
            <input type="hidden" name="current-password" id="form-current-password">
        </div>
        <div class="row center">
            <button type="submit" id="form-send" class="btn waves-effect waves-light blue">&Auml;ndern
                <i class="material-icons right">send</i>
            </button>
        </div>
        <div class="row center">
            <a href="{{ action("UserVerwaltungController@password") }}" class="btn-flat">Passwort &auml;ndern</a>
        </div>
        <div class="row center">
            <a href="{{ action("IndexController@index") }}" class="btn-flat">Zurück</a>
        </div>
    </form>
    <div id="modal-passwordagree" class="modal bottom-sheet">
        <div class="modal-content container">
            <h4 class="center-align thin">Bestätigung</h4>
            <b>Bitte bestätige die &Auml;nderungen mit deinem Passwort</b>
            <br>
            <div class="input-field col s12">
                <input id="modal_passwordagree-password" type="password" autocomplete="current-password" class="validate">
                <label for="modal-passwordagree">Passwort</label>
            </div>
        </div>
        <div class="modal-footer center-align">
            <a href="#!" class="modal-action modal-close waves-effect waves-green blue btn" style="float: none !important;" id="modal-send">Best&auml;tigen</a>
        </div>
    </div>
@endsection
@section("js")
    <script>
        $(function () {
            $('#modal-passwordagree').modal();
            $('#form-send').on('click', function (e) {
                e.preventDefault();
                $('#modal-passwordagree').modal('open')
            });
            $('#modal-send').on('click', function () {
                $('#form-current-password').val($('#modal_passwordagree-password').val());
                $('#changedata-form').submit();
            })
        })
    </script>
@endsection