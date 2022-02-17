@extends('layouts.master')

@section('title', 'Add Attributes')

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

                        <form method="POST" action="{{ route('product.attributes.store', $product->id) }}" enctype="multipart/form-data">
                        @csrf

                            <div class="form-group mb-3">
                                <label for="product">Product Name</label>
                                <input type="text" readonly="" value="{{ $product->product_name }}" class="form-control" name="product_name" required autofocus>                                
                            </div>

                            <div class="form-group mb-3">
                                <div class="field_wrapper">
                      <div>
                        <div class="d-md-flex pd-y-20 pd-md-y-0">
                                <input type="text" id="size" name="size[]" class="form-control" placeholder="Size" required>
                                <input type="text" id="color" name="color[]" class="form-control" placeholder="Color" required> 
                                <a href="javascript:void(0);" class="btn btn-primary pd-y-13 pd-x-20 bd-0 mg-md-l-10 mg-t-10 mg-md-t-0" id="add_button" title="Add field">Add</a>     
                                </div></div></div>                    
                            </div>

                           <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Save Product Attributes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Size</th>
                                <th scope="col">Color</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($productattr['attributes'] as $key => $attr)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $attr['size'] }}</td>
                                <td>{{ $attr['color'] }}</td>   
                                <td> 
                                    <a href="{{ route('product.attribute.destroy', ['id' => $attr['id']]) }}" class="btn btn-sm btn-danger">Delete </a>
                                </td>                             
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>  
    </div>
</main>
@endsection