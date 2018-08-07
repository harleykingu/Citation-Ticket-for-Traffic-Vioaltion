@extends('layouts.app')
@section('title', 'Login')
<div class="container">
  <h1 class="text-center text-primary">TRAFFIC ENFORCEMENT AGENCY OF MANDAUE</h1>
  <div class="v-center">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading"><i class="fa fa-lock fa-lg"></i> Login</div>
            <div class="panel-body">
              <img src="{{ asset('img/logo.png') }}" alt="mandaue Logo" class="img-responsive center-block" width="100" height="100"><br>
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} style="margin-left: 20px;"> Remember Me

                        </div>
                    </div>
                </form>

            </div>
            <div class="panel-footer">
              <div class="text-right">
                Don't have an account click <a href="{{ route('register') }}">Here</a>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 text-center white-text">
          <p>Copyright © 2017 UCLM CCS. All Rights Reserved</p>
      </div>
    </div>
  </div>
</div>
