@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>My Events</h1>
    </div>

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        @if (count($events) == 0)
        <p>You haven't created any events yet, <a href="{{route('events.create')}}">create event</a></p>
        @else
        <table class="table table-striped">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col" width="20%">Participantes</th>
                <th scope="col" width="10%">Ações</th>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <th scope="row">{{$event->id}}</th>
                        <th scope="row">{{$event->title}}</th>
                        <th scope="row">0</th>
                        <th scope="row" class="d-flex">
                            <a href="{{route('events.show', ['eventId' => $event->id])}}" class="btn btn-warning edit-btn mr-1">Show</a>
                            <a href="{{route('events.edit', ['eventId' => $event->id])}}" class="btn btn-info edit-btn mr-1">Edit</a>

                            <form action="{{route('events.destroy', ['eventId' => $event->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn">Delete</button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
@endsection
