@extends('layouts.master')

@section('title', 'Vendor Dashboard')

@section('content')
   
    <div class="container mb-4">
        <div class="row">
            
                <div class="col-12 col-sm-3">
                    <div class="card bg-light mb-3">
                        <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Vendor Tools </div>
                        <ul class="list-group category_block">
                            <li class="list-group-item"><a href="{{ route('category.create') }}">Add Category</a></li>
                            <li class="list-group-item"><a href="{{ route('category.index') }}">All Categories</a></li>
                            <li class="list-group-item"><a href="{{ route('product.create') }}">Add Product</a></li>
                            <li class="list-group-item"><a href="{{ route('product.index') }}">All Products</a></li>
                            <li class="list-group-item"><a href="">Update Vendor Profile</a></li>
                        </ul>
                    </div>
                    
                </div>
            

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