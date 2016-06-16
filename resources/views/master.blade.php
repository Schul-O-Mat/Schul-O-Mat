@extends("layouts.app")
@section("main")
    <ul class="collapsible" data-collapsible="expandable">
        <li>
            <div class="collapsible-header"><i class="material-icons">filter_list</i>Filtern</div>
            <div class="collapsible-body">
                <select name="schulart[]" multiple>
                    <option disabled selected>Schulart?</option>
                    <option value="1">&Ouml;ffentliche Schule</option>
                    <option value="2">Private Schule</option>
                </select>
                <select name="schulbetriebzustand[]" multiple>
                    <option disabled selected>Was f&uuml;r ein Betriebszustand hat deine Schule</option>
                    @foreach($schulzustand as $d)
                      <option value="{{$d->id}}">{{$d->Schulbetrieb}}</option>
                    @endforeach
                </select>
                <select name="schulform" multiple>
                    <option value="" disabled selected>Was f&uuml;r eine Form hat deine Schule</option>
                    @foreach($schulform as $s)
                      <option value="{{$s->id}}">{{$s->Schulform}}</option>
                    @endforeach
                </select>
                <select name="ort">
                    <option value="" disabled selected>W&auml;hle deine Stadt aus</option>
                    <option value="1">Bonn</option>
                    <option value="2">Duisburg</option>
                    <option value="3">Dortmund</option>
                </select>
                <label>W&auml;hle den Ort aus</label>
                <button class="blue btn waves-effect waves-light" type="submit" name="action">Filtern
                    <i class="material-icons right">filter_list</i>
                </button>
            </div>
        </li>
    </ul>
    <hr />
    <ul class="pagination">
        @if ($zurueck)
        <li class="waves-effect"><a href="/schulen/{{$page-1}}"><i class="material-icons">chevron_left</i></a></li>
        @else
        <li class="waves-effect disabled"><a href="#"><i class="material-icons">chevron_left</i></a></li>
        @endif @if ($weiter)
        <li class="chevron_right waves-effect"><a href="/schulen/{{$page+1}}"><i class="material-icons">chevron_right</i></a></li>
        @else
        <li class="chevron_right waves-effect disabled"><a href="#"><i class="material-icons">chevron_right</i></a></li>
        @endif
    </ul>
    <div class="row">
        <div class="col s12">
            <ul class="collection">
                @foreach ($data as $d)
                <li class="collection-item avatar">

                    <i class="material-icons circle
                              @if ($d->schulform == 2) light-green
                    @elseif ($d->schulform == 20) blue
                    @elseif ($d->schulform == 4) #aa00ff
                    @elseif ($d->schulform == 10) #d50000
                    @elseif ($d->schulform == 15) #ffff00
                    @else #9e9e9e
                              @endif
                              ">school</i>
                    <span class="title">{{$d->bezeichnung->schulbez1}}</span>
                          <p> @if($d->bezeichnung->schulbez2!=""){{$d->bezeichnung->schulbez2}}@endif </p>
                          <p> @if($d->bezeichnung->schulbez3!=""){{$d->bezeichnung->schulbez3}}@endif </p>
                          <p> @if($d->bezeichnung->kurzbez!=""){{$d->bezeichnung->kurzbez}}@endif     </p>
                    <a href="/schule/{{ $d->schulnr }}" class="secondary-content"><i class="blue-text material-icons">arrow_forward</i></a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
  </div>
  <ul class="pagination">
      @if ($zurueck)
        <li class="waves-effect"><a href="/schulen/{{$page-1}}"><i class="material-icons">chevron_left</i></a></li>
      @else
        <li class="waves-effect disabled"><a href="#"><i class="material-icons">chevron_left</i></a></li>
      @endif @if ($weiter)
        <li class="chevron_right waves-effect"><a href="/schulen/{{$page+1}}"><i class="material-icons">chevron_right</i></a></li>
      @else
        <li class="chevron_right waves-effect disabled"><a href="#"><i class="material-icons">chevron_right</i></a></li>
      @endif
  </ul>
    <script>
        $(document).ready(function () {
            $('select').material_select();
        });
    </script>
@endsection
