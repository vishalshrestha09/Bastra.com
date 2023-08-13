@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cart Item Details') }}</div>

                    <div class="card-body">
                        <p><strong>Product Name:</strong> {{ $cartItem->product->name }}</p>
                        <p><strong>Product Price:</strong> ${{ $cartItem->product->price }}</p>
                        <p><strong>Quantity:</strong> {{ $cartItem->quantity }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
