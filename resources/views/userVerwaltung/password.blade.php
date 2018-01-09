@extends("layouts.app")

@section("header")
    <h3 class="center-align">Dein Account - {{ Auth::user()->name }}</h3>
    <h4 class="center-align thin">Password &auml;ndern</h4>
@endsection

@section("main")
    <form class="container" action="{{ action("UserVerwaltungController@changePassword") }}" id="changedata-form" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
            <div class="input-field col s12">
                <input id="new-password" name="new-password" type="password" autocomplete="new-password" class="validate">
                <label for="new-password">Neues Passwort</label>
                @if($errors->has('new-password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('new-password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-field col s12">
                <input id="new-password_confirmation" name="new-password_confirmation" type="password" autocomplete="new-password" class="validate">
                <label for="new-password_confirmation">Neues Passwort (Wiederholung)</label>
                @if($errors->has('current-password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('current-password') }}</strong>
                    </span>
                @endif
            </div>
            <input type="hidden" name="current-password" id="form-current-password">
        </div>
        <div class="row center">
            <button type="submit" id="form-send" class="btn waves-effect waves-light blue">&Auml;ndern
                <i class="material-icons right">send</i>
            </button>
        </div>
        <div class="row center">
            <a href="{{ action("UserVerwaltungController@index") }}" class="btn-flat">Zur&uuml;ck</a>
        </div>
    </form>
    <div id="modal-passwordagree" class="modal bottom-sheet">
        <div class="modal-content container">
            <h4 class="center-align thin">Bestätigung</h4>
            <b>Bitte bestätige die &Auml;nderungen mit deinem aktuellen Passwort</b>
            <br>
            <div class="input-field col s12">
                <input id="modal_passwordagree-password" type="password" autocomplete="current-password" class="validate">
                <label for="modal-passwordagree">Aktuelles Passwort</label>
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