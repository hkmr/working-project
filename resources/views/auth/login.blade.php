@extends('main')

@section('title', '| Login')

@section('content')

   <!--   <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Login</h1>
                            <p>Create Posts</p>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </section><br> -->
    <!--/#action -->

<section id="services">
        <div class="container padding-bottom">
            <div class="row">
                
              <!-- <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form><br><br> -->


            <div class="login-box">
                <div class="lb-header">
                  <a href="#" class="active" id="login-box-link">Login</a>
                  <a href="#" id="signup-box-link">Sign Up</a>
                </div>
                <p class="header-text">Login with</p>
                <div class="social-login">
                  <a href="/auth/facebook/" class="facebook">
                    <i class="fa fa-facebook-official fa-2x"></i>
                    <p>Facebook</p>
                  </a>
                  <a href="/auth/twitter/" class="twitter">
                    <i class="fa fa-twitter fa-2x"></i>
                    <p>Twitter</p>
                  </a>
                  <a href="/auth/google/" class="google">
                    <i class="fa fa-google-plus fa-lg"></i>
                    <p>Google</p>
                  </a>
                </div>
                <!-- login form -->
                <form class="email-login form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                  <div class="u-form-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email"  placeholder="Email" name="email" value="{{ old('email') }}" required autofocus/>
                     @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="u-form-group form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password"  name="password" placeholder="Password" required/>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="checkbox u-form-group ">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                  </div>
                  <div class="u-form-group">
                    <button type="submit">Log in</button>
                  </div>
                  <div class="u-form-group">
                    <a href="{{ route('password.request') }}" class="forgot-password">Forgot password?</a>
                  </div>
                </form>

                <!-- signup form -->
                <form class="email-signup" role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                  <div class="u-form-group form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <input id="name" type="text"  placeholder="Name" name="name" value="{{ old('name') }}" required/>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                  </div>

                  <div class="u-form-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email"  placeholder="Email" name="email" value="{{ old('email') }}" required/>

                     @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>

                  <div class="u-form-group form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password"  placeholder="Enter password" name="password" required/>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="u-form-group">
                    <input id="password-confirm" type="password" placeholder="Re-enter password" name="password_confirmation" required/>
                  </div>
                  <div class="u-form-group">
                    <button type="submit">Sign Up</button>
                  </div>
                </form>
              </div>

            </div>
        </div>
    </section>
    <!--/#login-->

@endsection
