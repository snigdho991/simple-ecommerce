@extends('layouts.master')

@section('title', 'Edit Product')

@section('content')

<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6" style="margin-bottom: 30px;">
                <div class="card">
                    <div class="card-body">
                         
                        @if(count($errors) > 0)
                            <div class="alert alert-dismissible fade show color-box bg-danger bg-gradient p-4" role="alert">
                                <x-jet-validation-errors class="mb-4 my-2 text-white" />
                            </div>
                        @endif

                        <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                        @csrf

                            <div class="form-group mb-3">
                                <label for="product">Product Name</label>
                                <input type="text" placeholder="Product Name" value="{{ $product->product_name }}" class="form-control" name="product_name" required autofocus>                                
                            </div>

                            <div class="form-group mb-3">
                                <label for="product">Category</label>
                                <select name="category_id" class="form-control" required autofocus>
                                    @php
                                        $categories = \App\Models\Category::all();
                                    @endphp

                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>                              
                            </div>

                            <div class="form-group mb-3">
                                <label for="product">Change Image</label>
                                <input type="file" class="form-control" name="image" required autofocus>
                            </div>

                            <div class="form-group mb-3">
                                <label for="product">Product Description</label>
                                <input type="text" placeholder="Product Description" value="{{ $product->description }}" class="form-control" name="description" required autofocus>                                
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="product">Product Price</label>
                                <input type="number" placeholder="Product Price" value="{{ $product->product_price }}" class="form-control" step="any" min="1" name="product_price" required autofocus>                                
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Save Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection