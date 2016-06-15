@extends("layouts.app")
@section("main")
    <ul class="collapsible" data-collapsible="expandable">
        <li>
            <div class="collapsible-header"><i class="material-icons">filter_list</i>Filtern</div>
            <div class="collapsible-body">
                <label class="flow-text">Schulart:</label>
                <p>
                    <input name="schulart" type="radio" id="privateschule" />
                    <label for="privateschule">Private Schule</label>
                </p>
                <p>
                    <input selected name="schulart" type="radio" id="oefentlicheschule" />
                    <label for="oefentlicheschule">&Ouml;ffentliche Schule</label>
                </p>
                <!-- Dropdown Trigger -->
                <a class='blue dropdown-button btn' href='#' data-activates='dropdownsbz'>Schulbetriebszustand</a>
                <select name="schulbetriebzustand" id="drobdownsbz[]" multiple>
                    <option disabled selected>Was f&uuml;r ein Betriebszustand hat deine Schule</option>
                    <option value="1">ID 1</option>
                    <option value="2">ID 2</option>
                    <option value="3">ID 3</option>
                    <option value="4">ID 4</option>
                    <option value="5">ID 5</option>
                    <option value="6">ID 6</option>
                    <option value="9">ID 9</option>
                </select>

                <a href="" data-activates="dropdownschulart" class="blue dropdown-button btn">Schulform</a>
                <select name="schulart[]" id="dropdownschulart" multiple>
                    <option value="" disabled selected>Was f&uuml;r eine Form hat deine Schule</option>
                    <option value="grundschule">Grundschule</option>
                    <option value="hauptschule">Hauptschule</option>
                    <option value="volksschule">Volksschule</option>
                    <option value="foerderschule">F&ouml;rderschule</option>
                    <option value="realschule">Realschule</option>
                    <option value="sekundarschule">Sekundarschule</option>
                    <option value="gesamtschule">Gesamtschule</option>
                    <option value="gemeinschaftsschule">Gemeinschaftschule</option>
                    <option value="waldorfschule">Waldorfschule</option>
                    <option value="hiberniaschule">Hiberniaschule</option>
                    <option value="gymnasium">Gymnasium</option>
                    <option value="weiterbildungskolleg">Weiterbildungskolleg</option>
                    <option value="berufskolleg">Berufskolleg</option>
                    <option value="schulefuerkranke">Schule f&uuml;r Kranke</option>
                    <option value="foerderschulerealschule">F&ouml;rderschule im Bereich der Realschule</option>
                    <option value="foederschulegymnasium">F&ouml;rderschule im Bereich des Gymnasiums</option>
                    <option value="foerderschuleberufkolleg">F&ouml;rderschule im Bereich des Berufkollegs</option>
                </select>
                <a href="" data-activates="dropdownort" class="blue dropdown-button btn">Ort</a>
                <select name="ort" id="dropdownort">
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
@endsection
