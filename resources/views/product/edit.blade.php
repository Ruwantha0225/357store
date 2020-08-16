@extends('layouts.app')
@section('content')
    <div class="container">
        <form action={{route('product.update', $product->id)}} method="POST" enctype="multipart/form-data">
            @csrf
            <h2 class="text-center">Add New Product</h2>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}" />
            </div>
            <div class="form-group">
                <label for="desc">Description</label>
                <textarea name="desc" id="desc" class="form-control">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}" />
            </div>
            <div class="">
                <label for="img">Previous Image</label>
                <img src="" />
                <input type="file" name="img" id="img" class="form-control" />
            </div>
            <button class="btn btn-primary btn-lg float-right">Add Item</button>
        </form>
    </div>
@endsection