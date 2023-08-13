<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" class="form-control" value="{{old('name', $item->name)}}" required>
</div>

<div class="form-group">
    <label for="price">Price:</label>
    <input type="number" name="price" id="price" class="form-control" value="{{old('price', $item->price)}}" required>
</div>

<div class="form-group">
    <label for="description">Description:</label>
    <textarea name="description" id="description" class="form-control" required> {{old('description', $item->description)}}</textarea>
</div>

<div class="form-group">
    <label for="description">Image:</label>
    <input type="file" name="img" id="image" class="form-control">
</div>


<div class="form-group">
    <label for="product_category_id">Product Category:</label>
    <select name="product_category_id" id="product_category_id" class="form-control">
        <option value="">-- Select Product Category --</option>
        @foreach ($product_categories as $product_category)
            <option value="{{ $product_category->id }}" {{$product_category->id == old('product_category_id',$item->product_category_id) ? 'selected' : ''}}>{{ $product_category->name }}</option>
        @endforeach
    </select>
</div>