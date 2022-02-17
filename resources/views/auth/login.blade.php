@extends('layouts.master')

@section('title', 'Admin Login')

@section('content')

<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6" style="margin-bottom: 30px;">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="POST">
                        @csrf
                            <div class="form-group mb-3">
                                <label for="email">Email address</label>
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email" required autofocus>                                
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                
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