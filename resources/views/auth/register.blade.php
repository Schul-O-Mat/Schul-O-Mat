<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <!--    <link rel="stylesheet" href="../assets/sass/app.css">-->
    <link rel="stylesheet" href="/sass/login.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf8">
    <title>Schul-O-Mat</title>
</head>

<body>
<div class="row">
    <div class="input-cart col s12 m10 push-m1 z-depth-2 grey lighten-5">
        <div class="col s12 m5 login">
            <div class="signup-toggle center" >
                <h4 class="center">Du hast schon einen Account? <a href="{{ action("Auth\AuthController@getLogin") }}">Einloggen</a></h4>
            </div>
        </div>
        <!-- Signup form -->
        <div class="col s12 m7 signup">
            <div class="signupForm">
                <h4 class="center">Registrieren</h4>
                <br>
                <form action="{{ url('/register') }}" method="post" autocomplete="off" id="register-form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field">
                            <div class="input-field col s12 m6{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="signup-name">Benutzername</label>
                                <input type="text" id="signup-name" name="name" class="validate" required
                                       value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="input-field col s12 m6{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="signup-email">E-Mail Adresse</label>
                                <input type="email" id="signup-email" name="email" class="validate" required
                                       value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <div class="input-field col s12 m6{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="signup-password">Passwort</label>
                                <input type="password" id="signup-password" name="password" class="validate" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="input-field col s12 m6{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="signup-password-confirm">Passwort wiederholen</label>
                                <input type="password" id="signup-password-confirm" name="password_confirmation"
                                       class="validate" required>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <div class="input-field col s12 m6{{ $errors->has('vorname') ? ' has-error' : '' }}">
                                <label for="signup-vorname">Vorname</label>
                                <input type="text" id="signup-vorname" name="vorname" class="validate" required>
                                @if ($errors->has('vorname'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('vorname') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="input-field col s12 m6{{ $errors->has('nachname') ? ' has-error' : '' }}">
                                <label for="signup-nachname">Nachname</label>
                                <input type="text" id="signup-nachname" name="nachname" class="validate">
                                @if ($errors->has('nachname'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('nachname') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="form-register-schoolId" name="schulId">
                    <input type="hidden" id="form-register-schoolCode" name="schulcode">
                    <div class="row">
                        <div class="center">
                            <button type="submit" name="btn-signup" id="form-register-submit"
                                    class="btn blue waves-effect waves-light">Registrieren
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col s12">
            <br>
            <div class="legal center">
            </div>
            <div class="legal center">
                <div class="col s12">
                    <p class="center grey-text" style="font-size: 14px;">Made at Jugend Hackt West 2016 by awesome
                        people</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-chooseSchool" class="modal bottom-sheet">
    <div class="modal-content">
        <h4 class="thin center">Schule ausw&auml;hlen</h4>
        <b>Bitte w&auml;hle deine Schule aus.</b>
        <div class="row">
            <div class="row">
                <div class="input-field col s4">
                    <i class="material-icons prefix">location_city</i>
                    <input type="text" id="modal-register-ort" class="autocomplete validate">
                    <label for="modal-register-school">Ort</label>
                </div>
                <div class="input-field col s4">
                    <i class="material-icons prefix">school</i>
                    <input type="text" id="modal-register-school" class="autocomplete validate" disabled>
                    <label for="modal-register-school">Schule</label>
                </div>
                <div class="input-field col s4">
                    <i class="material-icons prefix">confirmation_number</i>
                    <input type="text" id="modal-register-schoolcode" pattern="[a-zA-Z0-9-]{8}" class="validate"
                           disabled>
                    <label for="modal-register-schoolcode">Schulcode</label>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer" style="text-align: center!important;">
        <a href="#!" class="modal-action modal-close waves-effect waves-green blue btn" disabled style="float: none !important;"
           id="modal-register-submit">Best&auml;tigen</a>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script>
    var staedte = JSON.parse("{{$staedte}}".replace(/&quot;/g, '"'));
    $(function () {
        $('#modal-register-ort').autocomplete({
            data: staedte,
            onAutocomplete: function (val) {
                $.getJSON('/api/schulenSearchOrt?ort=' + val, function (schulen) {
                    $('#modal-register-school').removeAttr('disabled')
                        .autocomplete({
                            data: schulen,
                            onAutocomplete: function () {
                                $('#modal-register-schoolcode').removeAttr('disabled')
                            },
                            minLength: 1
                        });
                })
            },
            minLength: 1
        });
        $(".dropdown-button").dropdown();
        $('.modal').modal();
        $('#form-register-submit').on('click', function (e) {
            e.preventDefault();
            $('#modal-chooseSchool').modal('open')
        })
        $('#modal-register-schoolcode').on('input', function () {
            if($('#modal-register-schoolcode').val().length === 8) {
                $('#modal-register-submit').removeAttr('disabled');
            } else {
                $('#modal-register-submit').attr('disabled', '');
            }
        })
        $('#modal-register-submit').on('click', function () {
            var schoolId = $('#modal-register-school').val();
            schoolId = schoolId.slice(schoolId.lastIndexOf("(ID:") + 4, schoolId.lastIndexOf(")"));
            var schoolCode = $('#modal-register-schoolcode').val();
            $('#form-register-schoolId').val(schoolId);
            $('#form-register-schoolCode').val(schoolCode);
            $('#register-form').submit();
        })
    });
</script>
</body>

</html>
