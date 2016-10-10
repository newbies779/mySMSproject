<section class="page regis-form">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
    {{ csrf_field() }}
        <div class="container">
            <div class="row">
                <div class="col-xs regis-title">
                    <h1>SIGN UP</h1>
                </div>
            </div>
            <!--First row-->
            <div class="row">
                <!--First column-->
                <div class="col-md-12">
                    <div class="md-form">
                        <i class="fa fa-user prefix"></i>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                        @if ($errors->regis->has('name'))
                            <span class="help-block text-warning">
                                <strong>{{$errors->regis->first('name') }}</strong>
                            </span>
                        @endif
                        <label for="name">What's your name?</label>
                    </div>
                </div>
                <!--Second column-->
                <div class="col-md-12">
                    <div class="md-form">
                        <i class="fa fa-envelope prefix"></i>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                        @if ($errors->regis->has('email'))
                            <span class="help-block text-warning">
                                <strong>{{ $errors->regis->first('email') }}</strong>
                            </span>
                        @endif
                        <label for="email" data-error="wrong" data-success="right">Type your email</label>
                    </div>
                </div>
            </div>
            <!--/.First row-->

            <!--Second row-->
            <div class="row">
                <!--First column-->
                <div class="col-md-6">
                    <div class="md-form">
                        <i class="fa fa-lock prefix"></i>
                        <input id="password" type="password" class="form-control" name="password">
                        @if ($errors->regis->has('password'))
                            <span class="help-block text-warning">
                                <strong>{{$errors->regis->first('password') }}</strong>
                            </span>
                        @endif
                        <label for="password" data-error="wrong" data-success="right">Type your password</label>
                    </div>
                </div>
                <!--Second column-->
                <div class="col-md-6">
                    <div class="md-form">
                        <i class="fa fa-lock prefix"></i>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                        @if ($errors->regis->has('password_confirmation'))
                            <span class="help-block text-warning">
                                <strong>{{$errors->regis->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                        <label for="password_confirmation" data-error="wrong" data-success="right">Confirm your password</label>
                    </div>
                </div>
            </div>
            <!--/.Second row-->

            <!--Third row-->
            <div class="row">
                <!--First column-->
                <div class="md-form form-group col-md-12">
                    <button type="submit" class="btn btn-default btn-lg btn-block">Login</button>
                </div>
            </div>

        </div>
    </form>
</section>