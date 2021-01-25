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

<div class="card login-boxa"> 
    <div class="card-body">
        <h5 class="card-title">Sign Up</h5>
        <x-jet-validation-errors class="mb-4" /> 

            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif 
        <form method="POST" action="{{ route('member.store') }}">
            @csrf
            <div class="form-group"> 
                <input type="text" class="form-control" id="username" aria-describedby="username" placeholder="Enter username" name="username" :value="old('username')" required autofocus >
            </div>
            <div class="form-group"> 
                <input type="text" class="form-control" id="email" aria-describedby="surname" placeholder="Enter surname" name="surname" :value="old('surname')" required autofocus >
            </div>
            <div class="form-group"> 
                <input type="text" class="form-control" id="email" aria-describedby="othername" placeholder="Enter othername" name="othername" :value="old('othername')" required autofocus >
            </div>
            <div class="form-group"> 
                <select class="form-control" name="gender">
                    <option selected value="" disabled>Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select> 
            </div>
            <div class="form-group"> 
                <select class="form-control" name="chapter_id">
                    <option selected value="" disabled>Select Chapter</option>
                    @foreach ($chapters as $chapter)
                    <option value="{{$chapter->id}}">{{$chapter->chapter_name}}</option> 
                    @endforeach
                </select> 
            </div>
            <div class="form-group"> 
                <label>Select Specialty</label>
                <div class="row">
                @foreach ($specialties as $specialty)
                <div class="col-md-4">
                    <input type="checkbox" name="specialty[]" value="{{$specialty->id}}" class="form-check-input"> <label class="form-check-label" for="specialty">{{$specialty->name}} </label>
                </div>
                @endforeach
                </div>
            </div>
            <div class="form-group"> 
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" :value="old('email')" required autofocus >
            </div>
            <div class="form-group">
                <input type="password" name="password" required autocomplete="current-password" class="form-control" id="password" placeholder="Password">
            </div>
          
            <button type="submit" class="btn btn-primary float-right m-l-xxs">  
                {{ __('Register') }} 
            </button>
            <a href="{{route('member.auth.login')}}" class="btn btn-secondary float-right">Login</a>
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