
@extends('templates.index')

@section('index_content')
<table class="table mt-4">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($productCategories as $product_category)
            <tr>
                <td>{{ $product_category->id }}</td>
                <td>{{ $product_category->name }}</td>
                <td>
                    <a href="{{ route('productscategories.show', $product_category) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('productscategories.edit', $product_category->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('productscategories.destroy', $product_category->id) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')"><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
