@extends('layouts.main')

@section('title', 'Search Result')

@section('content')
    <div id="search-container" class="col-md-12" style="background-color: #233240;">
        <h1>Busque por um evento</h1>
        <form action="{{ route('events.search') }}" method="get">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>

    <div id="events-container" class="col-md-12">
        <h2>Buscando por: {{$search}}</h2>
        <p class="subtitle">Veja os eventos encontrados</p>
        <div id="cards-container">
            @forelse ($events as $event)
                <div class="card col-md-3">
                    <img src="{{asset('img/events/' . $event->image)}}" class="img-fluid" alt="{{$event->title}}">
                    <div class="card-body">
                        <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                        <h5 class="card-title">{{$event->title}}</h5>
                        <p class="card-participants">5 confirmed participants</p>
                        <a href="{{ route('events.show', ['eventId' => $event->id]) }}" class="btn btn-primary">Continue reading</a>
                    </div>
                </div>
            @empty
                <p>Não há eventos próximos no momento</p>
            @endforelse
        </div>
    </div>
@endsection
