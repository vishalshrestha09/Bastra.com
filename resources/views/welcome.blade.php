<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Basrta.Com</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid mx-3 p-2">
            {{-- <a class="navbar-brand" href="#">Bastra.Com</a> --}}
            <h3 style="color: blue; font-size: 30px;" text-align="center"> Bastra.Com</h3>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active mx-3" aria-current="page" href="{{ route('home') }}"
                                        style="font-size: 20px;" text-align="center">Home</a>
                                </li>
                                <li class="nav-item mx-3">
                                    <a class="nav-link" href="#"
                                        style="color: #ef4444; font-size: 20px; "text-align="center">Women </a>
                                </li>
                                <li class="nav-item mx-3">
                                    <a class="nav-link" href="#" style="color: #ef4444; font-size: 20px;"
                                        text-align="center">Men</a>
                                </li>
                        </div>
                        <div class="col-md-4 ">
                            <img src="{{ url('/pictures/bastra.png') }}" height="50" width="60" alt="Bastra.Com">
                        </div>
                        <div class="col-md-1 mt-2">
                            <div class="dropdown ">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    More Products
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Summer Wear</a></li>
                                    <li><a class="dropdown-item" href="#">Winter Wear</a></li>
                                    <li><a class="dropdown-item" href="#">Bags</a></li>
                                    <li><a class="dropdown-item" href="#">Shoes</a></li>
                                    <li><a class="dropdown-item" href="#">Sun Glasses</a></li>
                                </ul>
                                <form class="d-flex" action="{{ route('home') }}">
                                    <i class="fas fa-search mx-2"></i>
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-success" type="submit">Search</button>
                                </form>
p                                
                            </div>
                        </div>
                    </div>
                </div>

                <form class="d-flex" action="{{ route('home') }}">
                    {{-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">  --}}
                    <button class="btn btn-success mx-2" type="submit">Login </button>
                </form>
                <form class="d-flex" action="{{ route('home') }}">
                    <button class="btn btn-success mx-2" type="submit">Register </button>
                </form>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Product Categories</h2>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Summer wear</a></li>
                <li class="list-inline-item"><a href="#">winter wear</a></li>
                <li class="list-inline-item"><a href="#">Bags</a></li>
                <li class="list-inline-item"><a href="#">shoes</a></li>
                <li class="list-inline-item"><a href="#">sunglasses</a></li>
                <div class="container">
                    <div class="row ">
                        @foreach ($productcategories as $productcategory)
                        <div class="col-md-4 pt-5">
                            <div class="card mb-3 flex-column"
                                style=" display:flex;justify-content: space-between; flex-wrap: wrap;">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $productcategory->name }}</h5>
                                        </div>
                                    </div>
            
                                    <button type="submit"
                                        style="text-align: center;  background-color: #4CAF50; /* Green */
                                            border: none;
                                            color: white;
                                            padding: 10px 10px;
                                            text-align: center;
                                            text-decoration: none;
                                            display: inline-block;
                                            font-size: 16px; width:365px;">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
            </ul>
        </div>
    </div>
</div>
    <div class="container">
        <div class="row ">
            @foreach ($products as $product)
            <div class="col-md-4 pt-5">
                <div class="card mb-3 flex-column"
                    style=" display:flex;justify-content: space-between; flex-wrap: wrap;">
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <img src="{{ $product->getFirstMediaUrl() ?:asset('/pictures/shoes.jpeg')}}" class="w-100 h-100 object-fit-cover"
                                alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">Price:Rs{{ $product->price }}</p>
                            </div>
                        </div>

                        <button type="submit"
                            style="text-align: center;  background-color: #4CAF50; /* Green */
                                border: none;
                                color: white;
                                padding: 10px 10px;
                                text-align: center;
                                text-decoration: none;
                                display: inline-block;
                                font-size: 16px; width:365px;">Add to Cart</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="footer"
        style="text-align: center;
            background-color: rgb(153, 150, 150);
            padding-top:50px;
            padding-bottom: 20px;">
        <p> FOR MORE INFORMATION</p>
        <a href="https://www.facebook.com/" class="fa fa-facebook" style=" background: #3B5998;
        color: white; "></a>
        <a href="https://www.instagram.com/" class="fa fa-instagram"style="  background: #125688;
        color: white;"></a>
        <p style="color: #fff">© Copyright 2023 Bastra.Com. All Rights Reserved.</p>
    </div>
    



   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
