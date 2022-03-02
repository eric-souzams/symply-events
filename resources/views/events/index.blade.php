@extends('layouts.main')

@section('title', 'Events')

@section('content')
    <div id="search-container" class="col-md-12" style="/*background-image: url({{asset('img/banner.jpg')}});*/background-color: #233240;">
        <h1>Busque por um evento</h1>
        <form action="" method="get">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>

    <div id="events-container" class="col-md-12">
        <h2>Próximos Eventos</h2>
        <p class="subtitle">Veja os eventos dos próximos dias</p>
        <div id="cards-container">
            @foreach ($events as $event)
                <div class="card col-md-3">
                    <img src="{{asset('img/events/' . $event->image)}}" class="img-fluid" alt="{{$event->title}}">
                    <div class="card-body">
                        <p class="card-date">01/03/2022</p>
                        <h5 class="card-title">{{$event->title}}</h5>
                        <p class="card-participants">5 confirmed participants</p>
                        <a href="{{ route('events.show', ['eventId' => $event->id]) }}" class="btn btn-primary">Continue reading</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
