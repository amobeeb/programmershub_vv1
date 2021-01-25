{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

<!-- Styles -->
<link rel="stylesheet" href="{{ mix('css/app.css') }}">

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
<div class="font-sans text-gray-900 antialiased">
{{ $slot }}
</div>
</body>
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Responsive Admin Dashboard Template">
<meta name="keywords" content="admin,dashboard">
<meta name="author" content="stacks">
<!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<!-- Title -->
<title>Administrator | Programmers' Hub</title>

<!-- Styles -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset('assets/plugins/font-awesome/css/all.min.css')}}" rel="stylesheet">

<!-- Theme Styles -->
<link href="{{ asset('assets/css/lime.min.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/custom.css')}}" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="login-page err-500">
<div class="container">
<div class="login-container">
    {{-- {{ $slot }} --}}
    <div class="row">
        <div class="col-lg-4 col-md-5 col-sm-9 lfh">
            
            <div class="card login-box"> 
                <div class="card-body">
                    <h5 class="card-title">Sign In</h5>
                    <x-jet-validation-errors class="mb-4" /> 

                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif 
                    <form method="POST" action="{{ route('member.auth.member_login') }}">
                        @csrf
                        <div class="form-group"> 
                            <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" :value="old('email')" required autofocus >
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" required autocomplete="current-password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="custom-control custom-checkbox form-group">
                            <input type="checkbox" class="custom-control-input" id="remember_me" name="remember">
                            <label class="custom-control-label" for="exampleCheck1">Remember</label>
                        </div>
                        <a href="#" class="float-left forgot-link"> 
                            @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                            @endif
                    </a>
                        <button type="submit" class="btn btn-primary float-right m-l-xxs">  
                            {{ __('Sign In') }}
                        
                            
                        </button>
                        <a href="{{route('member.auth.register')}}" class="btn btn-secondary float-right">Sign Up</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div> 

<!-- Javascripts -->
<script src="{{ asset('assets/plugins/jquery/jquery-3.1.0.min.js')}}"></script>
<script src="{{ asset('assets/plugins/bootstrap/popper.min.js')}}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{ asset('assets/js/lime.min.js')}}"></script>
</body>
</html>