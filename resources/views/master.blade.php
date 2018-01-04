@extends("layouts.app")
@section("main")
    <ul class="collapsible" data-collapsible="expandable" id="school_filter_ul">
        <li>
          <div class="collapsible-header">
            <i class="material-icons">filter_list</i>Filtern
          </div>
          <div class="center collapsible-body" id="school_filter">
            <form id="school_filter_form" method="get" action="{{action("SchulMasterController@paginationFilter")}}" class="form-horizontal">
              <input type="hidden" name="page" value="0">
              {{--<select name="schulform[]" multiple>--}}
                  {{--<option value="" disabled selected>Was f&uuml;r eine Form hat deine Schule</option>--}}
                  {{--@foreach($schulform as $s)--}}
                    {{--<option value="{{$s->id}}">{{$s->Schulform}}</option>--}}
                  {{--@endforeach--}}
              {{--</select>--}}
              <select name="ort">
                  <option value="" disabled selected>W&auml;hle deine Stadt aus</option>
                  @foreach($staedte as $s)
                    <option value="{{$s->ort}}">{{$s->ort}}</option>
                  @endforeach
              </select>
              <label>W&auml;hle den Ort aus</label>
              <button class="blue btn waves-effect waves-light" type="submit" name="action">Filtern
                  <i class="material-icons right">filter_list</i>
              </button>
            </form>
          </div>
        </li>
    </ul>
    <hr />
    <ul class="pagination">
        <div class="center-align">
            <p>Seite {{ $page+1 }} von {{ $cnt+1 }}</p>
        </div>
        @if ($zurueck)
            <li class="waves-effect"><a href="{{ action("SchulMasterController@pagination", ["page" => $page-1]) }}"><i class="material-icons">chevron_left</i></a></li>
        @else
            <li class="disabled"><a><i class="material-icons">chevron_left</i></a></li>
        @endif @if ($weiter)
            <li class="chevron_right waves-effect"><a href="{{ action("SchulMasterController@pagination", ["page" => $page+1]) }}"><i class="material-icons">chevron_right</i></a></li>
        @else
            <li class="chevron_right disabled"><a><i class="material-icons">chevron_right</i></a></li>
        @endif
    </ul>
    <div class="row">
        <div class="col s12">
            <ul class="collection">
                @foreach ($data as $d)
                <li class="collection-item avatar">
                    <i class="material-icons circle
                    @if ($d->schulformID == 1) light-green
                    @elseif ($d->schulformID == 7) blue
                    @elseif ($d->schulformID == 2) indigo
                    @elseif ($d->schulformID == 4) red darken-4
                    @elseif ($d->schulformID == 5)  teal
                    @else grey
                    @endif">school</i>
                    <span class="title">{{$d->bezeichnung}}</span>
                    <p> @if($d->bezeichnung_kurz != ""){{$d->bezeichnung_kurz}}@endif     </p>
                    <p> @if($d->details->strasse != "" and $d->details->ort != ""){{$d->details->strasse ." ". $d->details->ort}}@endif     </p>
                    <a href="{{ action("SchulDetailController@detail", ["id" => $d->id]) }}" class="secondary-content"><i class="blue-text material-icons">arrow_forward</i></a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
  </div>
  <ul class="pagination">
    @if ($zurueck)
      <li class="waves-effect"><a href="{{ action("SchulMasterController@pagination", ["page" => $page-1]) }}"><i class="material-icons">chevron_left</i></a></li>
    @else
      <li class="disabled"><a><i class="material-icons">chevron_left</i></a></li>
    @endif
    @if ($weiter)
      <li class="chevron_right waves-effect"><a href="{{ action("SchulMasterController@pagination", ["page" => $page+1]) }}"><i class="material-icons">chevron_right</i></a></li>
    @else
      <li class="chevron_right disabled"><a><i class="material-icons">chevron_right</i></a></li>
    @endif
        <div class="center-align">
            <p>Seite {{ $page+1 }} von {{ $cnt+1 }}</p>
        </div>
  </ul>
    <script>
        $(document).ready(function () {
            $('select').material_select();
        });
    </script>
@endsection
