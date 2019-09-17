<div class="sign-reg register">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="close-form"><span class="glyphicon glyphicon-remove"></span></div>
    <form method="post" action="{{ url('register') }}"> {{csrf_field()}}
        <h3>@lang('app.signup')</h3>
{{--        @include('admin.error')--}}
        <br/>
        <div class="adaptive">
            <div class="marg-bot">
                <div class="form-group col-xs-12 no-pad">
                    <label for="input_referral_number" class="col-sm-1 form-control-label glyphicon glyphicon-certificate"></label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="input_referral_number" name="referral_number" placeholder="@lang('signup.referral_number')" value="{{old('referral_number')}}"/>
                    </div>
                </div>
                <div class="form-group col-xs-12 no-pad {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    <label for="input_first_name" class="col-sm-1 form-control-label glyphicon glyphicon-user"></label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="input_first_name" name="first_name" placeholder="@lang('signup.first_name')" value="{{old('first_name')}}"/>
                        @if ($errors->has('first_name'))
                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-xs-12 no-pad {{ $errors->has('last_name') ? 'has-error' : '' }}">
                    <label for="input_last_name" class="col-sm-1 form-control-label glyphicon glyphicon-user"></label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="input_last_name" name="last_name" placeholder="@lang('signup.last_name')" value="{{old('last_name')}}"/>
                        @if ($errors->has('last_name'))
                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-xs-12 no-pad"></div>
                <div class="form-group col-xs-12 no-pad {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="input_email" class="col-sm-1 form-control-label glyphicon glyphicon-envelope"></label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="input_email" name="email" placeholder="@lang('signup.email')" value="{{old('email')}}" autocomplete="username email"/>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group col-xs-12 no-pad {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password" class="col-sm-1 form-control-label glyphicon glyphicon-lock"></label>
                <div class="col-sm-11">
                    <input type="password" class="form-control" id="password" name="password" placeholder="@lang('signup.password')" autocomplete="new-password"/>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group col-xs-12 no-pad {{ $errors->has('confirm_password') ? 'has-error' : '' }}">
                <label for="password_confirmation" class="col-sm-1 form-control-label glyphicon glyphicon-log-in"></label>
                <div class="col-sm-11">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="@lang('signup.confirm_password')" autocomplete="new-password"/>
                    @if ($errors->has('confirm_password'))
                        <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                    @endif
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="checkboxG1" id="checkboxG1" checked="checked" class="css-checkbox" />
                    <label for="checkboxG1" class="css-label radGroup1">@lang('signup.i_accept')
                        <a data-toggle="modal" data-target="#myModal3" href="#" onclick="scroll_to_top()" >@lang('app.terms')</a></label>
                </label>
            </div>
{{--            <button type="button" onclick="auth.signup( 'reg-field' )" class="btn btn-default hvr-radial-out right-but">@lang('app.signup')</button>--}}
            <button type="submit" class="btn btn-default hvr-radial-out right-but regb">@lang('app.signup')</button>
        </div>
    </form>
</div>

