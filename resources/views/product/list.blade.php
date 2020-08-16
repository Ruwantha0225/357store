@extends('layouts.app')
@section('content')
    <div class="container">
        @foreach ($products as $product)
            <div class="row container">
                <div class="col-md-3">
                    <img src="/storage/images/products/{{$product->img}}" style="width: 60%;" />
                </div>
                <div class="col-md-9">
                    <h4>{{ $product->name }}</h4>
                    <p class="text-danger">${{ $product->price }}/=</p>
                    <a href="{{ route('product.show', $product->id) }}" class="btn btn-success">VIEW</a><br><br>
                </div>
            </div>
        @endforeach
    </div>
@endsection