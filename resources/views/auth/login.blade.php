@extends('layouts.smslayout')
@section('content')
<div id="loginForm" class="container">
    <div class="row">
        <div class="card card-slide col-md-6 offset-md-3 shadow">
            <div class="panel panel-default">
                <div class="panel-heading text-md-center"><p class=" display-4" style="color:#0275d8;">Login</p></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="padding: 0.4rem;padding-bottom:1.5rem;">
                            <label for="email" class="col-sm-4 control-label" style="color:#0275d8;">E-Mail Address</label>

                            <div class="col-sm-7">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block text-warning">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="padding: 0.4rem;padding-bottom:1.5rem;">
                            <label for="password" class="col-md-4 control-label" style="color:#0275d8;">Password</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block text-warning">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <a class="btn btn-link col-md-4 offset-md-4" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input"> 
                                        <span class="custom-control-indicator"></span>
  <span class="custom-control-description">Remember Me</span>

                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="padding: 1rem;">
                            <div class="col-md-6 offset-md-4" style="padding-top: 2.5rem;">
                                <button id="loginButton" type="submit" class="btn btn-primary shadow">
                                    <i class="fa fa-btn fa-sign-in fa-lg"></i>
                                </button>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $('#loginnav').addClass("active");
        $('#homenav').hide();
    </script>
@stop