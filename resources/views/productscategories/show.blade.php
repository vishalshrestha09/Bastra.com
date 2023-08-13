@extends('adminlte::page')

@section('content')
    <h1>Product Category Details</h1>

    <table class="table mt-4">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $productCategory->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $productCategory->name }}</td>
            </tr>
        </tbody>
    </table>
@endsection
