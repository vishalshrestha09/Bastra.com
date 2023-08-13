@extends('adminlte::page')

@section('content')
    <h1>Product Details</h1>
    <table class="table mt-4">

        <tbody>

            <img src="{{$product->getFirstMediaUrl()}}" alt="" height="100px">
            <tr>
                <th>ID</th>
                <td>{{ $product->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>{{ $product->price }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $product->descripton }}</td>
            </tr>
            <tr>
                <th>Product categories</th>
                <td>{{ $product->productscategories }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Edit</a>
@endsection
