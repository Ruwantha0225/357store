@extends('layouts.app')
@section('content')
    <div class="home">
        <div class="banner row">
            <div class="col-6">
                <div class="bg-blue">
                    <img src="/storage/images/home/hero-banner.png" alt="">
                </div>
            </div>
            <div class="col-6">
                <div>
                    <h1>BROWSE OUR PREMIUM PRODUCTS</h1>
                    <h5>
                        NOW YOU CAN BUY YOUR ALL IT-NEEDS FROM ONE PLACE!
                    </h5>
                    <p>
                        if you need any it related thing to buy , we got you covered! we sell all the craps from books
                        to PCs. our recent products are listed below. If you got any troubles or feedbacks, feel free
                        to contact us. our team is here for you !

                    </p>
                    <a href="/product/all" class="btn shop-btn">VISIT SHOP</a>
                </div>
            </div>
        </div>
        <div class="container products mt-5">
            <h1 class="text-center"> Recent Products</h1>
            <div class="row">
                @foreach ($products as $product)
                    <div class="card col-md-3" style="width: 18rem;">
                        <img class="card-img-top" src="/storage/images/products/{{$product->img}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            {{--<p class="card-text">{{ $product->description }}</p>--}}
                            <a href="/product/show/{{$product->id}}" class="btn btn-primary">VIEW PRODUCT</a>
                        </div>
                    </div>  
                @endforeach
            </div>
        </div>
        <div class="container contact mt-5">
            <h1 class="text-center mb-3">Contact Us</h1>
            <div class="row">
                <div class="col-md-4 text-center">
                    <h3>Phone</h3>
                    <i class="fa fa-phone"></i>
                    <p>+1256856744</p>
                </div>
                <div class="col-md-4 text-center">
                    <h3>Address</h3>
                    <i class="fa fa-map-marker"></i>
                    <p>357store, bakers steet,
                     central scottland</p>
                </div>
                <div class="col-md-4 text-center">
                    <h3>Email</h3>
                    <i class="fa fa-envelope"></i>
                    <p>357sotres@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
@endsection

    

