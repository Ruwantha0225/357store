@extends('layouts.app')
@section('content')
    <div class="container">
        <img src="/storage/images/products/{{$product->img}}" style="width:40%" />
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->description }}</p>
        <p class="text-danger">{{ $product->price }}</p>
        {{-- <small>Created by: {{ $admin->name }} on: {{ $product->created_at }}</small> --}}
        <div>
            @guest
                <form method="POST" action="{{ route('addtocart') }}">
                    @csrf
                    <input type="hidden" name="prod_id" value="{{ $product->id }}" />
                    <button type="submit" class="btn btn-primary btn-sm">Add To Cart</button>
                </form>
            @elseif(Auth::user()->is_admin)
                <form method="POST" action="{{ route('addtocart') }}">
                    @csrf
                    <input type="hidden" name="prod_id" value="{{ $product->id }}" />
                    <button type="submit" class="btn btn-primary btn-sm">Add To Cart</button>
                </form>
                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning" >EDIT</a>
                <a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger" >DELETE</a>
            @else
                <form method="POST" action="{{ route('addtocart') }}">
                    @csrf
                    <input type="hidden" name="prod_id" value="{{ $product->id }}" />
                    <button type="submit" class="btn btn-primary btn-sm">Add To Cart</button>
                </form>
            @endguest
        </div>
    </div>
@endsection