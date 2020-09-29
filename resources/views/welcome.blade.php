


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Larasocial</title>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="../css/style1.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 </head>
    <body>


        <nav class="navbar fixed-top navbar-expand-md custom-navbar navbar-dark">
                         <a class="navbar-brand" href="#"><h1 style="color: blue;">Larasocial</h1></a>
                            <button class="navbar-toggler navbar-toggler-right custom-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                                <span class="navbar-toggler-icon "></span>
                            </button>
                              <div class="collapse navbar-collapse " id="collapsibleNavbar">
                                  <ul class="navbar-nav ml-auto ">
                                      @auth
                                    <li class="nav-item">
                                         <a  href="{{ url('/home') }}">Home</a>
                                     @else
                                    </li>
                                    <li class="nav-item">
                                      <a  href="{{ route('login') }}">Login</a>
                                    </li>
                                     @if (Route::has('register'))
                                    <li class="nav-item">
                                      <a  href="{{ route('register') }}">Register</a>
                                     @endif
                                     
                                    </li> 
                                     @endauth 
                                  </ul>
                              </div>  
</nav>
<br><br><br><br>
<div class="hero-image">

     @auth

      @else
      <div class="text-block"> 
    <div class="container login-container">
 <div class="col-md-6 login-form-2">
                    <h3>Sign in</h3>
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
                           
                        </div>
                        <div class="form-group">
                               @if (Route::has('password.request'))
                                    <a class="btn btn-link ForgetPwd" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            
                        </div>
                    </form>
                </div>
      </div>
</div>
   @endauth 
</div>

</body>
</html>



 




























       
