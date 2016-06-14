@extends("layouts.app")

@section("header")
  <h3 class="center-align">Hier sollte ein unabhängiges Feedback stehen!</h3>
@endsection

@section("main")
    <main class="container">
        <div class="row">
            <form action="/schule/{{$id}}/redaktion" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row" style="margin: 0 auto;">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea id="fundiertesfeedback" class="materialize-textarea" name="redaktionstext"></textarea>
                        <label for="fundiertesfeedback">Hier das Feedback</label>
                    </div>
                </div>
                <div class="row center-align" style="padding-top:50px;">
                    <a href="/" class="btn-flat">Zurück</a>
                    <button id="submitbutton" type="submit" class="btn waves-effect waves-light blue" href="/schulen" onclick="Materialize.toast('Data successfully saved!', 4000)">
                        Absenden<i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection
