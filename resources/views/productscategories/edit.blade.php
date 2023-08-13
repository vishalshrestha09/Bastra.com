
@extends('templates.index')

@section('index_content')
<h1>Edit Product Category</h1>

<a href="{{ route('productscategories.index') }}" class="btn btn-primary">Back to List</a>

<form action="{{ route('productscategories.update', $product_category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $product_category->name }}" class="form-control">
    </div>
    

    <button type="submit" class="btn btn-success">Save Changes</button>
</form>
@endsection
