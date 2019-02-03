<nav class="navbar navbar-expand-sm navbar-light bg-info" id="main-nav">
    <div class="container md">
        <button id="iamtoggler" class="navbar-toggler outline-none" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fas fa-ellipsis-h text-white"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">
            <div>
                <img src="{{ asset('favicon.png') }}" alt="{{ config('app.name') }} logo" class="img-fluid rounded" style="max-width: 100px">
            </div>
        </a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <form class="form-inline my-2 my-lg-0 mr-sm-2 ml-lg-3" style="position: relative;"
            action="{{ url('search') }}">
                <input name="keyword" class="form-control form-control-sm px-3 outline-none" type="search" placeholder="Search" aria-label="Search on online mall..." style="border-radius: 20px;" id="master-search">
                <span style="position: absolute;right: 10px;top: 3px;"><i class="fas fa-search text-muted"></i></span>
            </form>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item mr-lg-2">
                    <a class="nav-link px-sm-3" href="{{ url('/cart') }}">
                        <i class="fas fa-shopping-cart"></i>&nbsp;<span class="float-right cart-text">0</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div id="dark-section" class="bg-dark fixed-top">
    <div class="container md">
        <div class="row justify-content-between">
            <div class="col-sm-6">
                <div>
                    <div class="dropdown">
                        <button class="btn btn-dark btn-sm dropdown-toggle px-4" type="button" data-toggle="dropdown">
                            <i class="fa fa-list"></i>&nbsp;
                            Categories
                        </button>
                        <ul class="dropdown-menu" id="categories-dropdown">
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <ul class="nav justify-content-end">
                    @guest()
                    <li class="nav-item mr-sm-2">
                        <a class="nav-link px-sm-3" href="{{ route('register') }}">
                            <i class="fa fa-user">&nbsp;</i> Sign Up
                        </a>
                    </li>
                    <li class="nav-item mr-sm-2">
                        <a class="nav-link px-sm-3" href="{{ route('login') }}">
                            <i class="fa fa-sign-in-alt">&nbsp;</i> Log In
                        </a>
                    </li>
                    @else
                    <li class="nav-item mr-sm-2">
                        <a class="nav-link px-sm-3" href="javascript:void(0)">
                            {{-- <span style="display: inline-block;background-image: url({{ url('favicon.png') }});width: 40px;background-repeat: no-repeat;height: 40px;border-radius: 50%;background-size: 100% 100%;position: absolute;top: 0;left: 0;"></span> --}}
                            <span class="d-sm-inline d-none">&nbsp;&nbsp;&nbsp;<span class="d-sm-none d-lg-inline d-md-inline d-xl-inline">&nbsp;&nbsp;&nbsp;&nbsp;</span></span>
                            <span class="d-sm-none d-inline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <span class="d-sm-none d-lg-inline d-md-inline d-xl-inline">
                                Signed in as {{ explode(' ', Auth()->user()->name)[0] }} <i class="dropdown-caret"></i>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-sm-3" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign out &nbsp;<i class="fa fa-sign-out-alt"></i>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
<hr class="mt-0 mb-0">
<form action="{{ route('logout') }}" method="post" id="logout-form">
    @csrf
</form>