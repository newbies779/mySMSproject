@extends('layouts.smslayout') @section('content')
<div class="flex-container fxf-colw f-jc-c" id="content">
    <div id="loginForm" class="row">
        <div class="card card-slide col-xs-8 col-md-6 col-lg-4 offset-xs-2 offset-md-3 offset-lg-4 shadow">
            <div class="card-block">
                <h1 class="card-title" style="color:#0275d8;">Login</h1>
            </div>
            <div class="card-block">
                <form role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-xs-3 form-control-label">Email</label>
                        <div class="col-xs-9">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                        </div>
                        <div class="col-xs-9 offset-xs-3">
                            @if ($errors->has('email'))
                            <span class="help-block text-warning">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span> @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-xs-3 form-control-label">Password</label>
                        <div class="col-xs-9">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <a class="card-link forget-link pull-xs-right" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                        </div>
                        <div class="col-xs-9 offset-xs-3">
                            @if ($errors->has('password'))
                            <span class="help-block text-warning">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span> @endif
                        </div>
                    </div>
                    <div class="form-group row pull-xs-right">
                        <div class="col-xs-12">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                    <button id="loginButton" type="submit" class="btn btn-primary shadow">
                        <i class="fa fa-btn fa-sign-in fa-lg"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection @section('script')
<script>
$('#loginnav').addClass("active");
$('#homenav').hide();
</script>
@stop
