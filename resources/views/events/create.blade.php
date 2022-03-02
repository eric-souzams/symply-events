@extends('layouts.main')

@section('title', 'New Event')

@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Create your own event</h1>
        <form action="{{route('events.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Event banner:</label>
                <input type="file" name="image" id="image" class="form-control-file">
                {{ $errors->has('image') ? $errors->first('image') : '' }}
            </div>
            <div class="form-group">
                <label for="title">Event:</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Event name...">
                {{ $errors->has('title') ? $errors->first('title') : '' }}
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" id="city" class="form-control" placeholder="City name...">
                {{ $errors->has('city') ? $errors->first('city') : '' }}
            </div>
            <div class="form-group">
                <label for="private">Private event?</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
                {{ $errors->has('private') ? $errors->first('private') : '' }}
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" placeholder="Event description"></textarea>
                {{ $errors->has('description') ? $errors->first('description') : '' }}
            </div>

            <button type="submit" class="btn btn-primary w-100">Create Event</button>
        </form>
    </div>
@endsection
