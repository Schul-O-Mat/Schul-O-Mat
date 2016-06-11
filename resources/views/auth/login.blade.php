<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

    <!--    <link rel="stylesheet" href="../assets/sass/app.css">-->
    <link rel="stylesheet" href="/sass/login.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf8">
    <title>Schul-O-Mat | Login</title>
</head>

<body>
    <header class="center-align">
        <h1>Schul'O'Mat</h1>
        <h3 class="blue-text">#Login</h3>
    </header>
    <main class="row">
        <div class="col s12 m6 offset-m3">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-content">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"> @if ($errors->has('email'))
                                <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span> @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password"> @if ($errors->has('password'))
                                <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span> @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <!--                      <label>-->
                                <!--                          <input type="checkbox" name="remember"> Remember Me-->
                                <!--                      </label>-->
                                <p>
                                    <input type="checkbox" id="remember" name="remember" />
                                    <label for="remember">Erinnere dich an mich</label>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div <button type="submit" class="blue btn btn-primary"><i class="material-icons right">vpn_key</i>Login</button>

                        <a class="blue btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>

                        <a href="/" class="right btn-flat">Zurück</a>

                    </div>
            </form>
    </main>
    <footer>
        <p class="center-align">
            Made at Jugendhackt West 2016 by awesome people
        </p>
    </footer>
    <script type="text/javascript " src="https://code.jquery.com/jquery-2.1.1.min.js "></script>
    <script type="text/javascript " src="/js/bin/materialize.js "></script>

</body>

</html>