@extends('layouts.app')

@section('content')

 <section class="login py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <h4>Log in to your account</h4>
                    <form action="{{ route('login') }}" method="POST">
                        
                        @csrf
                        
						<div class="input-effect position-relative">
                                                  
                             <input id="email" type="email" class="form-control effect-17 w-100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label>Email</label>
                        
                        </div>

                        <div class="input-effect position-relative">
                             <input id="password" type="password" class="form-control effect-17 w-100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label>Password</label>
                           
                        </div>.
                        



                        <div class="form-group row">
                            <div class="col-md-6 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember_token') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                      
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <p class="text-center mt-3">or 

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            </p>
                        @endif
                        
                            <p class="text-center">Don't have an account? <a href="{{ route('register') }}" class="text-decoration-underline"> Sign up</a></p>
              
                            
                    </form>
                          </div>
            </div>
        </div>
    </section>
    
               

@endsection
