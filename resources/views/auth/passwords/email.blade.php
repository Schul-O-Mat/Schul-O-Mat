<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

    <!--    <link rel="stylesheet" href="../assets/sass/app.css">-->
    <link rel="stylesheet" href="/sass/login.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf8">
    <title>Schul-O-Mat</title>
</head>

<body>
    <div class="row">
        <div class="input-cart col s12 m10 push-m1 z-depth-2 grey lighten-5">
            <div class="col s12 m5 login">
                <h4 class="center">Passwort zur&uuml;cksetzen</h4>
                <br>
                <form action="{{ url('/password/email') }}" method="post" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-Mail Adresse</label>
                            <input type="text" id="email" name="email" class="validate" required="required" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row center">
                        <button type="submit" class="btn waves-effect waves-light blue">Zur&uuml;cksetzen</button>
                    </div>
                </form>
            </div>
            <!-- Signup form -->
            <div class="col s12 m7 signup">
                <div class="signup-toggle center" >
                    <h4 class="center">Passwort wieder eingefallen? <a href="{{action("Auth\AuthController@getLogin")}}">Anmelden</a></h4>
                </div>
            </div>
            <div class="col s12">
                <br>
                <div class="legal center">
                </div>
                <div class="legal center">
                    <div class="col s12">
                        <p class="center grey-text" style="font-size: 14px;">Made at Jugend Hackt West 2016 by awesome people</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript " src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript " src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
</body>

</html>
