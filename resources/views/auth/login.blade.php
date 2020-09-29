@extends('layouts.app')

@section('content')


<div class="container login-container">
    <div class="row justify-content-center">
  <div class="col-md-6 login-form-1">
                    <h3>{{ __('Login') }}</h3>
                    <form method="POST" action="{{ route('login') }}">
                         @csrf

                        <div class="form-group">
                            <input id="email" type="email" placeholder="Votre email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                           <input id="password" placeholder="Votre mot de passe" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btnSubmit">
                                    {{ __('Login') }}
                            </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                        </div>
                        
                    </form>
                </div>
            </div>
            </div>
   

@endsection
