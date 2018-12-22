<nav class="navbar navbar-expand-sm navbar-light bg-info" id="main-nav">
    <div class="container md">
        <button id="iamtoggler" class="navbar-toggler outline-none" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fas fa-ellipsis-h text-white"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">
            <div>
                <img src="favicon.png" alt="{{ config('app.name') }} logo" class="img-fluid rounded" style="max-width: 100px">
            </div>
        </a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <form class="form-inline my-2 my-lg-0 mr-sm-2 ml-lg-3" style="position: relative;">
                <input class="form-control form-control-sm px-3 outline-none" type="search" placeholder="Search" aria-label="Search on online mall..." style="border-radius: 20px;" id="master-search">
                <span style="position: absolute;right: 10px;top: 3px;"><i class="fas fa-search text-muted"></i></span>
            </form>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item mr-lg-2">
                    <a class="nav-link px-sm-3" href="javascript:void(0)">
                        <i class="fas fa-shopping-cart"></i>&nbsp;<span class="float-right">0</span>
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
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a class="test dropdown-toggle" tabindex="-1" href="#">Electronic</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu">
                                        <a class="test dropdown-toggle" href="#" tabindex="-1">Electronice Devices</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" tabindex="-1">Mobile</a></li>
                                            <li><a href="#" tabindex="-1">Tablets</a></li>
                                            <li><a href="#" tabindex="-1">Laptops</a></li>
                                            <li><a href="#" tabindex="-1">Desktop</a></li>
                                            <li><a href="#" tabindex="-1">Camera</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" class="test dropdown-toggle" tabindex="-1">Electronic Accessories</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" tabindex="-1">Mobile & Tablets</a></li>
                                            <li><a href="#" tabindex="-1">Laptops & Desktops</a></li>
                                            <li><a href="#" tabindex="-1">Camera</a></li>
                                            <li><a href="#" tabindex="-1">Routers</a></li>
                                            <li><a href="#" tabindex="-1">Wires & Cables</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="test dropdown-toggle" tabindex="-1" href="#">Home Applience</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" tabindex="-1">Refrigirator</a></li>
                                    <li><a href="#" tabindex="-1">Chimni</a></li>
                                    <li><a href="#" tabindex="-1">Heater</a></li>
                                    <li><a href="#" tabindex="-1">Washing Machine</a></li>
                                    <li><a href="#" tabindex="-1">Mixture & Blenders</a></li>
                                    <li><a href="#" tabindex="-1">Rice Cooker</a></li>
                                    <li><a href="#" tabindex="-1">A/C & Fans</a></li>
                                    <li><a href="#" tabindex="-1">TV</a></li>
                                    <li><a href="#" tabindex="-1">Iron</a></li>
                                </ul>
                            </li>
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
                            <span style="display: inline-block;background-image: url({{ url('favicon.png') }});width: 40px;background-repeat: no-repeat;height: 40px;border-radius: 50%;background-size: 100% 100%;position: absolute;top: 0;left: 0;"></span>
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
@section('script')
<script>
    function isScrolledIntoView(elem)
    {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();

        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();

        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }
    function doFunc()
    {
        let main_nav = $('#main-nav');
        if(main_nav.length === 0) return;
        if(!isScrolledIntoView(main_nav[0])) main_nav.addClass('fixed-top mt-4').closest('body').addClass('nav-is-fixed');
    }
    function notDoFunc()
    {
        let main_nav = $('#main-nav');
        if(main_nav.length === 0) return;
        main_nav.removeClass('fixed-top mt-4').closest('body').removeClass('nav-is-fixed');
    }
    $(function() {
        $('.dropdown-submenu a.test').on("click", function(e) {
            $(this).next('ul').toggle();
            $(this).closest('li').siblings('li').find('.dropdown-menu').hide();
            e.stopPropagation();
            e.preventDefault();
        });
        let last_scroll = 0;
        $(window).scroll(function(e) {
            let current_scroll = $(this).scrollTop();
            if(last_scroll > current_scroll) doFunc();
            else notDoFunc();
            last_scroll = current_scroll;
        });
    });
</script>
@endsection