@extends('layouts.main')

@section('title', 'Edit: ' . $event->title)

@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Edit: {{$event->title}}</h1>
        <form action="{{route('events.update', ['eventId' => $event->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="image">Event banner:</label>
                <input type="file" name="image" id="image">
                <img src="{{asset('img/events/' . $event->image)}}" alt="{{$event->title}}" class="img-preview">

                {{ $errors->has('image') ? $errors->first('image') : '' }}
            </div>
            <div class="form-group">
                <label for="title">Event:</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Event name..." value="{{$event->title}}">
                {{ $errors->has('title') ? $errors->first('title') : '' }}
            </div>
            <div class="form-group">
                <label for="date">Event date:</label>
                <input type="date" name="date" id="date" class="form-control" placeholder="Event date..." value="{{$event->date->format('Y-m-d')}}">
                {{ $errors->has('date') ? $errors->first('date') : '' }}
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" id="city" class="form-control" placeholder="City name..." value="{{$event->city}}">
                {{ $errors->has('city') ? $errors->first('city') : '' }}
            </div>
            <div class="form-group">
                <label for="private">Private event?</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">No</option>
                    <option value="1" {{$event->private == 1 ? 'selected' : ''}}>Yes</option>
                </select>
                {{ $errors->has('private') ? $errors->first('private') : '' }}
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" placeholder="Event description" rows="5">{{$event->description}}</textarea>
                {{ $errors->has('description') ? $errors->first('description') : '' }}
            </div>
            <div class="form-group">
                <label for="items">Add infrastructure items:</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Chairs"> Chairs
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Stage"> Stage
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Free Beer"> Free Beer
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Open Food"> Open Food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Prizes"> Prizes
                </div>
                {{ $errors->has('items') ? $errors->first('items') : '' }}
            </div>

            <button type="submit" class="btn btn-primary w-100">Update Event</button>
        </form>
    </div>
@endsection
