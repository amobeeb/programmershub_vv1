<x-guest-layout>
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
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group"> 
                                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" :value="old('email')" required autofocus >
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
                                    <a href="sign-up.html" class="btn btn-secondary float-right">Sign Up</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    {{-- <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" /> --}}

        {{-- @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form> --}}
    {{-- </x-jet-authentication-card> --}}
</x-guest-layout>
