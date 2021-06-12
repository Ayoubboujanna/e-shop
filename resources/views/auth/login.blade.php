{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection --}}


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="login_css_js/bootstrap/bootstrap-grid.css">
    <link rel="stylesheet" href="login_css_js/bootstrap/bootstrap-reboot.css">
    <link rel="stylesheet" href="login_css_js/bootstrap.min.css">
    <link rel="stylesheet" href="login_css_js/bootstrap.min.css.map">
    <link rel="stylesheet" href="login_css_js/owl.carousel.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="login_css_js/style.css">

    <title>Login</title>
</head>

<body>



    <div class="content">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="form-block">
                                <div class="mb-4">
                                    <h3>Sign In to <strong>SHOPCLOTHES</strong></h3>

                                </div>
                                <form action="{{ route('login') }}" method="post">
                                    @csrf

                                    <div class="form-group first">
                                        <label for="email">{{ __('E-Mail Address') }}</label>
                                        <input type="text" class="form-control" id="email" @error('email') is-invalid
                                            @enderror name="email" value="{{ old('email') }}" required
                                            autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>

                                    <div class="form-group last mb-4">
                                        <label for="password">{{ __('Password') }}</label>
                                        <input type="password" class="form-control" id="password" @error('password')
                                            is-invalid @enderror name="password" required
                                            autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>

                                    <div class="d-flex mb-5 align-items-center">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="exampleCheck1">{{ __('Remember Me') }}</label>
                                        </div>

                                        @if (Route::has('password.request'))
                                        <span class="ml-auto"><a href="{{ route('password.request') }}"
                                                class="forgot-pass">{{ __('Forgot Your Password?') }}</a></span>
                                        @endif

                                    </div>

                                    <input type="submit" value="Log In"
                                        class="btn btn-pill text-white btn-block btn-primary">


                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>


    <script src="login_css_js/js/bootstrap.min.js"></script>
    <script src="login_css_js/js/jquery-3.3.1.min.js"></script>
    <script src="login_css_js/js/main.js"></script>
    <script src="login_css_js/js/owl.carousel.min.js"></script>
    <script src="login_css_js/js/popper.min.js"></script>

</body>

</html>