@extends('layouts.master')

@section('title', 'All Product')

@section('content')
   
    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Prie</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $key => $product)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->product_price }}</td>
                                <td>
                                    <div class="inline" style="display: flex; gap: 5px;">
                                        <a href="{{ route('product.attributes', $product->id) }}" class="btn btn-info btn-sm">Add Attributes</a> 

                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a> 
                                        <form method="POST" action="{{ route('product.destroy', $product->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')" style="margin-left: 5px;" title="Delete" type="submit">Delete</button> 
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>            
        </div>
    </div>

@endsection