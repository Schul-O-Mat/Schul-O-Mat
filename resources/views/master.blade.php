@extends("layouts.app")

@section("main")
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
            @else #9e9e9 @endif">
              school</i>
            <span class="title">{{$d->bezeichnung->schulbez1}}</span>
                  <p>@if($d->bezeichnung->schulbez2!=""){{$d->bezeichnung->schulbez2}}@endif
                <br> @if($d->bezeichnung->schulbez3!=""){{$d->bezeichnung->schulbez3}}@endif
                <br> @if($d->bezeichnung->kurzbez!=""){{$d->bezeichnung->kurzbez}}@endif
            </p>
            <a href="/schule/{{ $d->schulnr }}" class="secondary-content"><i class="blue-text material-icons">arrow_forward</i></a>
          </li>
        @endforeach
      </ul>
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
