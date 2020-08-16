@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3><b>WELCOME TO THE 357 STORE!</b></h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  <h4>  YOU ARE IN !</h4>
                  <p>now you can purchase products from our website</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
