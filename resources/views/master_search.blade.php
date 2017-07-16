@extends('layouts.app')
@section("main")
  <div class="row">
    <div class="col s12">
      <ul class="pagination">
        @if ($zurueck)
          <li class="waves-effect"><a href="{{ action("SearchController@searchGet", ["page" => $page-1, "searchword" => $userSearch]) }}"><i class="material-icons">chevron_left</i></a></li>
        @else
          <li class="waves-effect disabled"><a><i class="material-icons">chevron_left</i></a></li>
        @endif @if ($weiter)
          <li class="chevron_right waves-effect"><a href="{{ action("SearchController@searchGet", ["page" => $page+1, "searchword" => $userSearch]) }}"><i class="material-icons">chevron_right</i></a></li>
        @else
          <li class="chevron_right waves-effect disabled"><a><i class="material-icons">chevron_right</i></a></li>
        @endif
      </ul>
      <ul class="collection">
        @foreach ($data as $d)
          <li class="collection-item avatar">
            <i class="material-icons circle
            @if ($d->schulform == 2) light-green
            @elseif ($d->schulform == 20) blue
            @elseif ($d->schulform == 4) #aa00ff
            @elseif ($d->schulform == 10) #d50000
            @elseif ($d->schulform == 15) #ffff00
            @else #9e9e9e @endif">
              school</i>
                      <span class="title">{{$d->schulbez1}}</span>
                            <p>{{$d->schulbez2}}
                          <br> {{$d->schulbez3}}
                          <br> {{$d->kurzbez}}
                      </p>
            <a href="{{ action("SchulDetailController@detail", ["id" => $d->schulnr]) }}" class="secondary-content"><i class="blue-text material-icons">arrow_forward</i></a>
          </li>
        @endforeach
      </ul>
        <ul class="pagination">
            @if ($zurueck)
                <li class="waves-effect"><a href="{{ action("SearchController@searchGet", ["page" => $page-1, "searchword" => $userSearch]) }}"><i class="material-icons">chevron_left</i></a></li>
            @else
                <li class="waves-effect disabled"><a href="#"><i class="material-icons">chevron_left</i></a></li>
            @endif @if ($weiter)
                <li class="chevron_right waves-effect"><a href="{{ action("SearchController@searchGet", ["page" => $page+1, "searchword" => $userSearch]) }}"><i class="material-icons">chevron_right</i></a></li>
            @else
                <li class="chevron_right waves-effect disabled"><a href="#"><i class="material-icons">chevron_right</i></a></li>
            @endif
        </ul>
    </div>
  </div>
@endsection
