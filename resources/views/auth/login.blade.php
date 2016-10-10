<section class="page login-form page--current">
    <div class="logo">
        <h1>SMS</h1>
    </div>
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <div class="container">
            <div class="row">
                <!--Email validation-->
                <div class="md-form col-xs">
                    <i class="fa fa-envelope prefix"></i>
                    <i class="fa fa-question-circle prefix" data-toggle="tooltip" data-placement="right" title="HINT: this is a hint!"></i>
                    <input type="email" id="email" name="email" class="form-control" required>
                    <label for="email" data-error="wrong" data-success="right">Type your email</label>
                    @if ($errors->has('email'))
                        <span class="help-block text-warning">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <!--Password validation-->
                <div class="md-form col-xs">
                    <i class="fa fa-lock prefix"></i>
                    <input type="password" id="password" name="password" class="form-control" required>
                    <label for="password" data-error="wrong" data-success="right">Type your password</label>
                    @if ($errors->has('password'))
                        <span class="help-block text-warning">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <label class="custom-control custom-checkbox col-xs pull-xs-right">
                  <input type="checkbox" name="remember" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">remember me</span>
                </label>
                <div class="md-form form-group col-xs">
                    <button type="submit" class="btn btn-default btn-lg btn-block" id="login">Login</button>
                </div>
            </div>
        </div>
    </form>
</section>