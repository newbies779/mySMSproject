@extends('layouts.smslayout')

@section('content')
<div id="regisForm" class="container">
    <div class="row">
        <div class="card card-slide col-sm-6 offset-sm-3 shadow">
            <div class="panel panel-default">
                <div class="panel-heading text-sm-center"><p class=" display-4" style="color:#0275d8;">Register</p></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="padding: 1rem;">
                            <label for="name" class="col-sm-4 control-label" style="color:#0275d8;">Name</label>

                            <div class="col-sm-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block text-warning">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="padding: 1rem;">
                            <label for="email" class="col-sm-4 control-label" style="color:#0275d8;">E-Mail Address</label>

                            <div class="col-sm-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block text-warning">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="padding: 1rem;">
                            <label for="password" class="col-sm-4 control-label" style="color:#0275d8;">Password</label>

                            <div class="col-sm-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block text-warning">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}" style="padding: 1rem;">
                            <label for="password-confirm" class="col-sm-4 control-label" style="color:#0275d8;">Confirm Password</label>

                            <div class="col-sm-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block text-warning">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" style="padding: 1rem;">
                            <div class="col-sm-6 offset-sm-4" style="padding: 1.5rem;">
                                <button id="regisButton" type="submit" class="btn btn-primary shadow">
                                    <i class="fa fa-btn fa-user"></i>
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
        $('#regisnav').addClass("active");
        $('#homenav').hide();
    </script>
@stop
