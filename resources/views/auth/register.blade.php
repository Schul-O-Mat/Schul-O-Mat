<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

    <!--    <link rel="stylesheet" href="../assets/sass/app.css">-->
    <link rel="stylesheet" href="sass/login.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf8">
    <title>Schul-O-Mat | Registrieren</title>
</head>

<body>
    <header class="center-align">
        <h1>Schul'O'Mat</h1>
        <h3 class="green-text">#Register</h3>
    </header>
    <main class="row">
        <div class="col s12 m6 offset-m3">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-content form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <span class="card-title">Benutzername</span>

                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"> @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span> @endif
                    </div>

                    <div class="card-content form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <span class="card-title">E-Mail Address</span>

                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"> @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
                    </div>

                    <div class="card-content form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <span class="card-title">Password</span>

                        <input id="password" type="password" class="form-control" name="password"> @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                    </div>

                    <div class="card-content form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <span class="card-title">Confirm Password</span>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"> @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span> @endif
                    </div>

                    <div class="card-action">
                        <button type="submit" class="green btn btn-primary"><i class="material-icons right">vpn_key</i>Registrieren</button>
                        <a class="btn green" href="/"></a>
                    </div>
            </form>
            </div>
        </div>
        </div>
    </main>
    <footer>
        <p class="center-align">
            Made at Jugendhackt West 2016 by awesome people
        </p>
    </footer>
    <script type="text/javascript " src="https://code.jquery.com/jquery-2.1.1.min.js "></script>
    <script type="text/javascript " src="../assets/js/bin/materialize.js "></script>

</body>

</html>