
@extends('adminlte::page')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endif
                <h1>Profile</h1>
                {{-- <p>Welcome, {{ $user->name }}!</p> --}}
                @foreach ($errors->all() as $error )
                    <p>{{$error}}</p>
                @endforeach
                <form action="{{ route('profiles.checkPassword') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="current_password">Current Password:</label>
                        <input type="password" name="current_password" id="current_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="new_password">New Password:</label>
                        <input type="password" name="new_password" id="new_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password:</label>
                        <input type="password" name="password_confirmation" />
                    </div>
                    <button type="submit" class="btn btn-primary">Check Password</button>
                </form>
            </div>
        </div>
    </div>
@stop

