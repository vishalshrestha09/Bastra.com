@extends('adminlte::page')

@section('content')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
            <p>{{$error}}</p>
            </div>
        @endforeach
    @endif
    
<form action="{{ route($route.'store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="card mt-3">
        <div class="card-header">
            <h1>Add {{$title}}</h1>
        </div>
        <div class="card-body">
            @yield('create_content')
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>

@endsection
