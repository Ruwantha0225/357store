@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center">Orders List</h1>
        <div class="row">
            <div class="col-md-3 bg-dark text-light">
                <strong>Customer ID</strong>
            </div>
            <div class="col-md-3 row bg-dark text-light">
                <div class="col-md-6 text-center">
                    <strong>Product ID</strong>
                </div>
                <div class="col-md-6">
                    <strong>Amount</strong>
                </div>
            </div>
            <div class="col-md-3 bg-dark text-light">
                <strong>Address</strong>
            </div>
            <div class="col-md-3 bg-dark text-light">
                <strong>Ordered date</strong>
            </div>
            @foreach ($sellings as $selling)
                <?php
                    $products = json_decode($selling->products, true);
                ?>
                <div class="col-md-3 mb-3 mt-3 border-left border-top border-bottom pt-2 pb-2">
                    <p>{{ $selling->cus_id }}</p>
                </div>
                <div class="col-md-3 row mb-3 mt-3 border-top border-bottom pt-2 pb-2">
                    @foreach ($products as $key=>$item)
                        <div class="col-md-6 text-center">
                            <a href="/product/show/{{$key}}" target="_blank" class="btn btn-outline-secondary">{{$key}}</a>
                        </div>
                        <div class="col-md-6">
                            <p class="text-success">{{$item[1]}}</p>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-3 mb-3 mt-3 border-top border-bottom pt-2 pb-2">
                    <p>{{ $selling->address }}</p>
                </div>
                <div class="col-md-3 mb-3 mt-3 border-top border-bottom border-right pt-2 pb-2">
                    <p>{{ $selling->updated_at }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
