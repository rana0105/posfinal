<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pos System</title>
    {{-- @include('partial.style') --}}
    {!! Html::style('css/login.css') !!}
</head>
<body>
    {{-- <div class="container"> --}}
        {{-- <div class="card card-container">
            
            <p id="profile-name" class="profile-name-card">Point Of Sale</p>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <span id="reauth-email" class="reauth-email"></span>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}" style="margin-top: 25px;">
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                
                
                <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form>
        </div> --}}
        <section id="login-page">
            <div class="login-form">
            <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            {{-- <input placeholder='Username' type='text'>
            <input placeholder='Password' type='password'> --}}
            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}" style="margin-top: 25px;">
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="col-md-8" style="text-align: right; margin-top: 15px;">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">SIGN IN</button>
                
            {{-- <button>SIGN IN</button> --}}
              </form>
            </div>
        </section>
   {{--  </div> --}}
{{-- @include('partial.javascript') --}}
{{-- {!! Html::script('js/login.js') !!} --}}
</body>
</html>


