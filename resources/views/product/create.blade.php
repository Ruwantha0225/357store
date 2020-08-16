@extends('layouts.app')
@section('content')
    <div class="container">
        <form action={{route('product.store')}} method="POST" enctype="multipart/form-data">
            @csrf
            <h2 class="text-center">Add New Product</h2>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" />
            </div>
            <div class="form-group">
                <label for="desc">Description</label>
                <textarea name="desc" id="desc" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control" />
            </div>
            <div class="form-group">
                <label for="img">Add Image</label>
                <input type="file" name="img" id="img" class="form-control" />
            </div>
            <input type="hidden" name="uid" value={{auth()->user()->id}} />
            <button class="btn btn-primary btn-lg float-right">Add Item</button>
        </form>
    </div>
@endsection