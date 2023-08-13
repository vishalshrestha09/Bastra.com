@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Cart Item') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('carts.update', $cartItem->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="{{ $cartItem->quantity }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Cart Item</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
