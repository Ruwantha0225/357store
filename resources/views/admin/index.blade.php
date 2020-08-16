@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center">Orders List</h1>
        <div class="row border">
            @foreach ($sellings as $selling)
                <?php
                    $products = json_decode($selling->products, true);
                ?>
                <div class="col-md-3">
                    <strong>Customer ID</strong>
                    <p>{{ $selling->cus_id }}</p>
                </div>
                <div class="col-md-3 row">
                    @foreach ($products as $key=>$item)
                        <div class="col-md-6 text-center">
                            <p>Product ID</p>
                            <a href="/product/show/{{$key}}" target="_blank" class="btn btn-success">{{$key}}</a>
                        </div>
                        <div class="col-md-6">
                            <p>Amount</p>
                            <p class="text-success">{{$item[1]}}</p>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-3">
                    <p>{{ $selling->address }}</p>
                </div>
                <div class="col-md-3">
                    <p>Ordered date</p>
                    <p>{{ $selling->updated_at }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
