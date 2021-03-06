<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->

    <title>vitrine_clothes</title>

    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <!-- MDB -->
    <link href=" {{ asset("assets/css/mdb.min.css") }}" rel="stylesheet" />





</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('images/loading.gif') }}" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header" style="background-color: blue">
            <div class="container-full">
                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-9 col-sm-9 ">
                        <div class="menu-area">

                            <div class="logo" style="margin-left:6%"><a href="/"><i class="fas fa-tshirt"></i>

                                    shopclothes </a>
                            </div>
                            <div class="limit-box">
                                <nav class="main-menu" style="margin-right: 78px">
                                    <ul class="menu-area-main">

                                        {{-- <li>

                                            <form action="#" class="d-flex mr-3">

                                                <input type="text" name="q" class="form-control" value="Search">

                                                <button type="submit" class="btn btn-info"><i class="fa fa-search"
                                                        aria-hidden="true"></i></button>
                                            </form>
                                        </li> --}}
                                        <li> <a href="/"><i class="fa fa-home"></i> Home</a> </li>

                                        {{-- @can('manage')
                                        <li> <a href="{{ route('products.index') }} "> Manage Products</a> </li>
                                        @endcan
                                        @can('manage')
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.users.index') }} "> Manage
                                                Users</a>
                                        </li>
                                        @endcan

                                        @can('manage')
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.orders.index') }}"> Manage
                                                Orders</a>
                                        </li>
                                        @endcan


                                        @can('manage')
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('/admin/view-coupons')}}">
                                                Manage
                                                Promotions</a>
                                        </li>
                                        @endcan --}}



                                        @guest
                                        @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline"><i
                                                    class="fas fa-share"></i> Login</a>
                                        </li>
                                        @endif

                                        @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a href="{{ route('register') }}"
                                                class="ml-4 text-sm text-gray-700 underline"><i class="fas fa-plus"></i>
                                                Register</a>
                                        </li>
                                        @endif
                                        @else
                                        <li class="nav-item dropdown">

                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" v-pre>
                                                <i class='fa fa-user' style='font-size:24px;margin-right:6px'>
                                                </i>{{  Auth::user()->name }}
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="navbarDropdown">
                                                @can('manage')
                                                <a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard </a>
                                                @endcan

                                                <a class="dropdown-item" href="{{ route('checkout.show') }}">Mes
                                                    commandes </a>

                                                <a class="dropdown-item" href="{{ route('basket.show') }}">Panier</a>
                                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                        @endguest
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <!-- end header inner -->
    </header>

    {{-- new lines added  --}}
    <div class="container">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul class="mb-0 mt-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {{-- new lines added  --}}
    </div>




    <!-- end header -->

    @yield('content');

    <!--  footer -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-6 col-sm-12 width">
                        <div class="address">
                            <h3>Address</h3>

                            <i><img src="/icon/3.png">Locations</i>

                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 width">
                        <div class="address">
                            <h3>Menus</h3>

                            <i><img src="/icon/2.png">Locations</i>

                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 width">
                        <div class="address">
                            <h3>Useful Linkes</h3>

                            <i><img src="/icon/1.png">Locations</i>

                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 width">
                        <div class="address">
                            <h3>Social Media </h3>
                            <ul class="contant_icon">

                                <li><img src="/icon/fb.png" alt="icon" /></li>
                                <li><img src="/icon/tw.png" alt="icon" /></li>
                                <li><img src="/icon/lin (2).png" alt="icon" /></li>
                                <li><img src="/icon/instagram.png" alt="icon" /></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 width">
                        <div class="address">
                            <h3>Newsletter </h3>
                            <input class="form-control" placeholder="Enter your email" type="type"
                                name="Enter your email">
                            <button class="submit-btn">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <!-- MDB -->
    <script type="text/javascript" src="{{ asset('assets/js/mdb.min.js')}}"></script>
    <script>
        $(document).ready(function(){
        $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
        });
        
        $(".zoom").hover(function(){
        
        $(this).addClass('transition');
        }, function(){
        
        $(this).removeClass('transition');
        });
        });
        
    </script>

</body>

</html>