@extends('layouts.master')

@section('title', 'Admin Registration')

@section('content')

<main class="signup-form">
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

                        <form action="{{ route('register') }}" method="POST">
                        @csrf

                            <div class="form-group mb-3">
                                <label for="email">Name</label>
                                <input type="text" placeholder="Name" id="name" class="form-control" name="name" required autofocus>                                
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Email address</label>
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email" required autofocus>                                
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>                               
                            </div>

                            <div class="form-group mb-3">
                                <label for="confirm-password">Confirm Password</label>
                                <input type="password" placeholder="Confirm Password" id="confirm-password" class="form-control" name="password_confirmation" required>                               
                            </div>

                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection