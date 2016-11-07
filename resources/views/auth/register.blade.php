@extends('layouts.smslayout') @section('content')
<div class="container-fluid" id="content">
    <div id="regisForm" class="row">
        <div class="card card-slide col-xs-8 col-md-6 col-lg-4 offset-xs-2 offset-md-3 offset-lg-4 shadow">
            <div class="card-block">
                <h1 class="card-title" style="color:#0275d8;">Register</h1>
            </div>
            <div class="card-block">
                <form role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}
                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-xs-3 form-control-label">Name</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="col-xs-9 offset-xs-3">
                            @if ($errors->has('name'))
                            <span class="help-block text-warning">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span> @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-xs-3 form-control-label">Email</label>
                        <div class="col-xs-9">
                            <input type="email" class="form-control" id="email" name="email" placeholder="email">
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
                        </div>
                        <div class="col-xs-9 offset-xs-3">
                            @if ($errors->has('password'))
                            <span class="help-block text-warning">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span> @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password_confirmation" class="col-xs-3 form-control-label">Confirm Password</label>
                        <div class="col-xs-9 flex-container f-ai-c">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"placeholder="Confirm Password">
                        </div>
                        <div class="col-xs-9 offset-xs-3">
                            @if ($errors->has('password_confirmation'))
                            <span class="help-block text-warning">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span> @endif
                        </div>
                    </div>
                    <button id="regisButton" type="submit" class="btn btn-primary shadow">
                        <i class="fa fa-btn fa-user fa-lg"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection @section('script')
<script>
$('#regisnav').addClass("active");
$('#homenav').hide();
</script>
@stop
