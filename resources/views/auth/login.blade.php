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
            <h4 class="center">Log in</h4>
            <br>
            <form action="{{ url('/login') }}" method="post" autocomplete="off">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">E-Mail Adresse</label>
                        <input type="text" id="email" name="email" class="validate" required="required"
                               value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="input-field{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">Passwort</label>
                        <input type="password" id="password" name="password" class="validate" required="required">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <button type="submit" name="login" class="btn waves-effect waves-light blue">Log in</button>
                    <a class="white black-text btn btn-link right"
                       href="{{ action("Auth\PasswordController@getEmail") }}">Passwort vergessen?</a>
                </div>
            </form>
        </div>
        <!-- Signup form -->
        <div class="col s12 m7 signup">
            <div class="signup-toggle center">
                <h4 class="center">Du hast noch keinen Account? <a href="{{ action("Auth\AuthController@getRegister") }}">Registrieren</a></h4>
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
        $(function () {
            $(".dropdown-button").dropdown();
            $('.modal').modal();
        })
</script>
</body>

</html>
