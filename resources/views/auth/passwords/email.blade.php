@extends('layouts.smslayout')

@section('content')
<div class="container-fluid" id="content">
    <div class="row">
        <div class="card card-slide col-xs-8 col-md-6 col-lg-4 offset-xs-2 offset-md-3 offset-lg-4 shadow">
            <div class="card-block">
                <h1 class="card-title" style="color:#0275d8;">Reset password</h1>
            </div>
            <div class="card-block">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group style"margin-top:1rem;">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                            </button>
                        </div>
                    </div>
                </form>
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
