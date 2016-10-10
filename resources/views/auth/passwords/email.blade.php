<!--Card-->
<div class="card forget-card">
    <!--Card content-->
    <div class="card-block">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <h4 class="card-title">Reset password</h4>
                    <p class="card-text">Can't remember your password, right?<br> It's ok. We will send an email back!!</p>
                </div>
                <div class="col-xs-12 col-md-6" style="padding: 60px 0;min-width:50%;">
                    <form class="form-horizontal form-inline" id="formReset" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="md-form form-group">
                                        <i class="fa fa-envelope prefix"></i>
                                        <a id="resetSubmit" href="#"><i class="fa  fa-send-o prefix" style="right: -20%;font-size: 20px;top: 10%;"></i></a>
                                        <input type="email" id="resetEmail" name="email" class="form-control">
                                        <label for="resetEmail" data-error="wrong" data-success="right">Type your email</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/.Card content-->
</div>