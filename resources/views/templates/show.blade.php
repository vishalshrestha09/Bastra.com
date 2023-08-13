@extends('adminlte::page')

@section('content')
    <h1>{{$title}}</h1>

    <a href="{{ route($route.'index') }}" class="btn btn-primary">Back to List</a>
    
    <div class="card">
        <div class="card-body">
            <!-- Display the details of the item here -->
            <p><strong>Name:</strong> {{ $item->name }}</p>
            <p><strong>Description:</strong> {{ $item->description }}</p>
        </div>
    </div>
@endsection
