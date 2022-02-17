    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Simple Ecommerce</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item m-auto">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>

                    @if(Auth::check())
                        <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-danger nav-link">
                            <i class="font-size-16 text-danger"></i>

                            <span key="t-logout">
                                {{ __('Log out') }}
                            </span>                            
                        </button>
                    </form>
                    @else
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>

                    @endif

                </ul>

                <form class="form-inline my-2 my-lg-0">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search...">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-secondary btn-number">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <a class="btn btn-success btn-sm ml-3" href="cart.html">
                        <i class="fa fa-shopping-cart"></i> Cart
                        <span class="badge badge-light">3</span>
                    </a>
                </form>
            </div>
        </div>
    </nav>

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading" style="text-transform: uppercase;">@yield('title')</h1>
         </div>
    </section>