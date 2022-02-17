@extends('layouts.master')

@section('title', 'Home Page')

@section('content')
   
    <div class="container mb-4">
        <div class="row">

            
                <div class="col">
                <div class="row">
                    @foreach($products as $product)
                    <div class="mb-4 col-12 col-md-6 col-lg-4">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('app/uploads/product_images/large/'.$product->image) }}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title"><a href="" title="View Product">{{ $product->product_name }}</a></h4>
                                <p class="card-text">{{ $product->description }}</p>
                                <div class="row">
                                    <div class="col">
                                        <p class="btn btn-danger btn-block">{{ $product->product_price }} $</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection