<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
          <img src="/storage/images/logo.jpg" style="width: 50px; height: 50px; border-radius: 50%;" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto ml-2">
              <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/product/all">shop</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/product/addtocart">cart</a>
              </li>
              
                
              
            </ul>
            {{-- <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> --}}
            
            <form action="{{route('search')}}" method="GET">
                @csrf
                <div class="row">
                    <div class="col-md-10">
                        <input type="text" name="search" class="form-control" placeholder="search products" />
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-sm p-2"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          @if (auth()->user()->is_admin)
                            <a class="dropdown-item" href="{{ route('product.create') }}">
                                Create Product
                            </a>
                            <a class="dropdown-item" href="{{ route('register') }}">
                                Register User
                            </a>
                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                orders
                            </a>
                          @endif
                          <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
          </ul>
      </div>
  </div>
</nav>