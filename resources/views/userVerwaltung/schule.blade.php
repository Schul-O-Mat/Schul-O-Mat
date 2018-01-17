@extends("layouts.app")

@section("header")
    <h3 class="center-align">Dein Account - {{ Auth::user()->name }}</h3>
    <h4 class="center-align thin">Schule &auml;ndern</h4>
@endsection

@section("main")
    <form class="container" action="{{ action("UserVerwaltungController@changeSchool") }}" id="changeschool-form" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">location_city</i>
                <input type="text" id="ort" class="autocomplete validate">
                <label for="ort">Ort</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">school</i>
                <input type="text" id="school" name="school" class="autocomplete validate" disabled>
                <label for="school">Schule</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">confirmation_number</i>
                <input type="text" id="schoolcode" name="schoolcode" pattern="[a-zA-Z0-9-]{8}" class="validate autocomplete"
                       disabled>
                <label for="schoolcode">Schulcode</label>
            </div>
        </div>
        <input type="hidden" name="current-password" id="form-current-password">
        <div class="row center">
            <button type="submit" id="form-send" class="btn waves-effect waves-light blue" disabled>&Auml;ndern
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
                <input id="modal-passwordagree-password" type="password" autocomplete="current-password" class="validate">
                <label for="modal-passwordagree-password">Aktuelles Passwort</label>
            </div>
        </div>
        <div class="modal-footer center-align">
            <a href="#!" class="modal-action modal-close waves-effect waves-green blue btn" style="float: none !important;" id="modal-send">Best&auml;tigen</a>
        </div>
    </div>
@endsection
@section("js")
    <script>
        var staedte = JSON.parse("{{$staedte}}".replace(/&quot;/g, '"'));
        $(function () {
            $('#ort').autocomplete({
                data: staedte,
                onAutocomplete: function (val) {
                    console.log('hallo')
                    $.getJSON('/api/schulenSearchOrt?ort=' + val, function (schulen) {
                        $('#school').removeAttr('disabled')
                            .autocomplete({
                                data: schulen,
                                onAutocomplete: function () {
                                    $('#schoolcode').removeAttr('disabled')
                                },
                                minLength: 1
                            });
                    })
                },
                minLength: 1
            });
            $('.modal').modal();
            $('#form-send').on('click', function (e) {
                e.preventDefault();
                $('#modal-passwordagree').modal('open')
            })
            $('#schoolcode').on('input', function () {
                if($('#schoolcode').val().length === 8) {
                    $('#form-send').removeAttr('disabled');
                } else {
                    $('#form-send').attr('disabled', '');
                }
            })
            $('#modal-send').on('click', function () {
                $('#form-current-password').val($('#modal-passwordagree-password').val());
                $('#changeschool-form').submit();
            })
        });
    </script>
@endsection