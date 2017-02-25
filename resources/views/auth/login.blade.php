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
                <h4 class="center">Log in</h4>
                <br>
                <form action="{{ url('/login') }}" method="post" autocomplete="off">
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
                        {{--<div class="switch col s6">--}}
                            {{--<label>--}}
                                {{--<input type="checkbox">--}}
                                {{--<span class="lever"></span>--}}
                                {{--Remember Me--}}
                            {{--</label>--}}
                        {{--</div>--}}
                        <button type="submit" name="login" class="btn waves-effect waves-light blue">Log in</button>
                        <a class="white black-text btn btn-link right" href="{{ action("Auth\PasswordController@getEmail") }}">Passwort vergessen?</a>
                    </div>
                </form>
            </div>
            <!-- Signup form -->
            <div class="col s12 m7 signup">
                <div class="signupForm">
                    <h4 class="center">Registrieren</h4>
                    <br>
                    <form action="{{ url('/register') }}" method="post" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="input-field">
                                <div class="input-field col s12 m6{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="signup-name">Benutzername</label>
                                    <input type="text" id="signup-name" name="name" class="validate" required value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input-field col s12 m6{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="signup-email">E-Mail Adresse</label>
                                    <input type="text" id="signup-email" name="email" class="validate" required value="{{ old('email') }}">
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
                                    <input type="password" id="signup-password-confirm" name="password_confirmation" class="validate" required>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s7">
                                <button type="submit" name="btn-signup" class="btn blue right waves-effect waves-light">Registrieren</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="signup-toggle center" >
                    <h4 class="center">Du hast noch keinen Account? <a href="#!">Registrieren</a></h4>
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
    <script>
        /*
         Code By Ilyes CH
         ** Celyes **
         contact : http://fb.com/celyes17
         */
        jQuery(document).ready(function($){
            $(".dropdown-button").dropdown();
            $('.modal').modal();
            $(".signup-toggle").click(function(){
                $(this).hide();
                $(".signupForm").show(300);
                $(".policy").css("visibility","visible");
            });
        });

    </script>
</body>

</html>
