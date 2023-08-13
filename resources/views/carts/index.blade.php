<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h2>Shopping Cart</h2>
        @if ($cartItems->isEmpty())
            <p>Your cart is empty.</p>
            <a href="{{ route('carts.create') }}" class="btn btn-primary">Start Shopping</a>

        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $cartItem)
                        <tr>
                            <td>{{ $cartItem->product->name }}</td>
                            <td>{{ $cartItem->product->category->name }}</td>
                            <td>${{ $cartItem->product->price }}</td>
                            <td>
                                <form action="{{ route('carts.update', $cartItem->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" value="{{ $cartItem->quantity }}" min="1">
                                    <button type="submit">Update</button>
                                </form>
                            </td>
                            <td>RS {{ $cartItem->product->price }}</td>
                            <td>RS {{ $cartItem->product->price * $cartItem->quantity }}</td>
                            <td>
                                <form action="{{ route('carts.destroy', $cartItem->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Remove</button>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
                 </table>
                            <div class="text-center">
                                <a href="{{ route('carts.create') }}" class="btn btn-primary">Add More Products</a>
                            </div>
                        {{-- @else
                            <p>Your cart is empty.</p>
                            <div class="text-center">
                                <a href="{{ route('carts.create') }}" class="btn btn-primary">Start Shopping</a>
                            </div>
                        @endif --}}
                    </div>
                </div>
            </table>
        @endif
    </div>
</body>
</html>
