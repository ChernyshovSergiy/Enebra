{{--@extends('Information.common.index_nav')--}}
{{--@section('form')--}}
    <div class="sign-reg signin">
    <div class="close-form"><span class="glyphicon glyphicon-remove"></span></div>
    <form method="post" action="">
        <h3>@lang('auth.auth')</h3>
        <div class="form-group col-xs-12 no-pad">
            <label for="inputEmail" class="col-sm-3 form-control-label">E-mail</label>
            <div class="col-sm-9">
{{--                <input type="text" class="form-control signIn-field" id="login" name="login" />--}}
                <input type="text" id="inputEmail" class="form-control signIn-field" name="email" placeholder="@lang('signup.email')" autocomplete="username email"/>
            </div>
        </div>
        <div class="form-group col-xs-12 no-pad">
            <label for="inputPass" class="col-sm-3 form-control-label ">@lang('auth.password')</label>
            <div class="col-sm-9">
{{--                <input type="password" class="form-control signIn-field" id="password" name="password" />--}}
                <input type="password" id="inputPass" class="form-control signIn-field" name="password" placeholder="@lang('signup.password')" autocomplete="current-password"/>
            </div>
        </div>
        <button type="button" onclick="auth.signIn( 'signIn-field' )" class="btn btn-default hvr-radial-out right-but">@lang('auth.signin')</button>
        <div class="clearfix"></div>
        <h3 class="forg">@lang('auth.forgot')</h3>
        <div class="form-group col-xs-12 no-pad">
            <label for="inputForgotEmail" class="col-sm-1 form-control-label glyphicon glyphicon-envelope" ></label>
            <div class="col-sm-11">
                <input type="text" class="form-control" id="inputForgotEmail" placeholder="@lang('auth.email')" />
            </div>
        </div>
        <div class="form-group col-xs-12 no-pad">
            <label for="inputPhone" class="col-sm-1 form-control-label glyphicon glyphicon-phone"></label>
            <div class="col-sm-11">
                <input type="text" class="form-control" id="inputPhone" placeholder="@lang('auth.phone')"/>
            </div>
        </div>
        <button type="submit" class="btn btn-default hvr-radial-out right-but">@lang('app.send')</button>
        <div class="clearfix"></div>
        <div class="regb">
            <div class="btn btn-default hvr-radial-out">@lang('app.signup')</div>
        </div>
    </form>
</div>
{{--@endsection--}}