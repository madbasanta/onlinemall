<nav class="navbar fixed-top navbar-expand-sm bg-info navbar-dark">
    {{-- <div class="container md"> --}}
        <button id="iamtoggler" class="navbar-toggler outline-none" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fas fa-ellipsis-h"></span>
        </button>
        <a class="navbar-brand" href="javascript:void(0)">
            <div><img src="favicon.png" alt="{{ config('app.name') }} logo" class="img-fluid rounded" style="max-width: 100px"></div>
        </a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <form class="form-inline my-2 my-lg-0 mr-sm-2 ml-lg-3" style="position: relative;">
                <input class="form-control form-control-sm px-3 outline-none" type="search" placeholder="Search" aria-label="Search" style="border-radius: 20px;">
                <span style="position: absolute;right: 10px;top: 3px;"><i class="fas fa-search text-muted"></i></span>
            </form>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item mr-sm-2">
                    <a class="nav-link px-sm-3" href="{{ route('register') }}">
                        <i class="fa fa-user"></i>&nbsp; <span class="d-sm-none d-lg-inline d-md-inline">Sign Up</span>
                    </a>
                </li>
                <li class="nav-item mr-sm-2">
                    <a class="nav-link px-sm-3" href="{{ route('login') }}">
                        <i class="fa fa-sign-in-alt"></i>&nbsp; <span class="d-sm-none d-lg-inline d-md-inline">Log In</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-sm-3" href="javascript:void(0)">
                        <i class="fas fa-shopping-cart">&nbsp;0</i>&nbsp;
                    </a>
                </li>
            </ul>
        </div>
    {{-- </div> --}}
</nav>
<hr class="mt-0 mb-0">