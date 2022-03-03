@extends('layouts.main')

@section('title', 'Events')

@section('content')
    <div id="search-container" class="col-md-12" style="background-color: #233240;">
        <h1>Search event</h1>
        <form action="{{ route('events.index') }}" method="get">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>

    <div id="events-container" class="col-md-12">
        @if ($search)
        <h2>Search results for: {{$search}}</h2>
        @else
        <h2>Next Events</h2>
        @endif
        <p class="subtitle">See the events of the next days</p>
        <div id="cards-container">
            @forelse ($events as $event)
                <div class="card col-md-3">
                    <img src="{{asset('img/events/' . $event->image)}}" class="img-fluid" alt="{{$event->title}}">
                    <div class="card-body">
                        <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                        <h5 class="card-title">{{$event->title}}</h5>
                        <p class="card-participants">{{$event->users->count()}} confirmed participants</p>
                        <a href="{{ route('events.show', ['eventId' => $event->id]) }}" class="btn btn-primary">View more</a>
                    </div>
                </div>
            @empty
                @if ($search)
                <p>Could not find any event with <strong>{{$search}}</strong></p>
                @else
                <p>There are no upcoming events at the moment</p>
                @endif
            @endforelse
        </div>
    </div>
@endsection
