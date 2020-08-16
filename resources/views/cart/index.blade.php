@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center text-primary mb-5 mt-2">Checkout From Cart</h1>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <h2>
                        {{ $product->name }}
                        <a href="/removefromcart/{{$product->id}}" class="btn btn-outline-danger btn-sm">X</a>
                    </h2>
                    <img src="/storage/images/products/{{$product->img}}" style="width: 200px;" />
                    <p> {{ $product->price }} </p>
                    <p> {{ $product->amount }} </p>
                </div>
            @endforeach
        </div>
        <h3>{{ $total }}</h3>
        <form method="POST" action="{{ route('checkout') }}">
            @csrf
            <div class="form-group">
                <label for="address">Shipping Address</label>
                <textarea name="address" id="address" cols="30" rows="10" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">CHECK OUT</button>
        </form>
    </div>
@endsection