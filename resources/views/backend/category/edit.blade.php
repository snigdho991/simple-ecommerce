@extends('layouts.master')

@section('title', 'Edit Category')

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

                        <form method="POST" action="{{ route('category.update', $category->id) }}">
                        @method('PATCH')
                        @csrf

                            <div class="form-group mb-3">
                                <label for="category">Category Name</label>
                                <input type="text" placeholder="Category Name" id="category" class="form-control" value="{{ $category->name }}" name="name" required autofocus>                                
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Save Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection