{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">

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
                    name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm"
                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
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

    <title>Register</title>
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
                                    <h3>Register</h3>

                                </div>
                                <form action="{{ route('register') }}" method="post">
                                    @csrf

                                    <div class="form-group first">
                                        <label for="name" class="col-md-4 col-form-label">{{ __('Name') }}</label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group first">
                                        <label for="email"
                                            class="col-md-4 col-form-label">{{ __('E-Mail Address') }}</label>
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
                                        <label for="password"
                                            class="col-md-4 col-form-label ">{{ __('Password') }}</label>
                                        <input type="password" class="form-control" id="password" @error('password')
                                            is-invalid @enderror name="password" required
                                            autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="form-group last mb-4">
                                        <label for="password-confirm"
                                            class="col-md-4 col-form-label ">{{ __('Confirm Password') }}</label>


                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">

                                    </div>

                                    {{-- <input type="submit" value="{{ __('Register') }}" class="btn btn-pill
                                    text-white btn-block
                                    btn-primary"> --}}



                                    <button type="submit" class="btn btn-pill
                                        text-white btn-block
                                        btn-primary">
                                        {{ __('Register') }}
                                    </button>



                            </div>


                            {{-- <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-pill text-white btn-block btn-primary">
                                        {{ __('Register') }}
                            </button>--}}

                        </div>
                    </div>
                </div>



                </form>
            </div>
        </div>
    </div>

    </div>

    </div>
    </div>
    </div>


    <script src=" js/jquery-3.0.0.min.js"> </script>
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