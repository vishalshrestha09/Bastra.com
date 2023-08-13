@extends('adminlte::page')

@section('content')
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
        <p>{{$error}}</p>
        </div>
    @endforeach
    @endif

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            <p>{{session('success')}}</p>
        </div>
    @endif
    <h1>{{$title}}</h1>

    <a href="{{ route($route.'create') }}" class="btn btn-primary">Add New</a>
    <div class="card mt-3">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <table class="table">
                        @yield('index_content')
                    </table>
                </div>
            </div>
            </div>
    </div>

@endsection
