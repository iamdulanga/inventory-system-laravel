@extends('layouts.master')
@section('top')
<style type="text/css">
    .row-centered
    {
        text-align: center;
    }
    .col-centered
    {
        display: inline-block;
        float: none;
        text-align: left;
        margin-right: -4px;
    }
</style>
@stop
@section('content')
<!-- Log on to codeastro.com for more projects! -->
<div class="box box-success">

    <div class="box-header">
        <h3 class="box-title">Add Users</h3>
    </div>
    <div class="box-body">
        <div class="row row-centered">
            <div class="col-md-8 col-centered">
                <form class="form-auth-small" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="signup-email" class="control-label sr-only">Name</label>
                        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="signup-email"name="name" value="{{ old('name') }}" required autofocus placeholder="Name">
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                
                    <div class="form-group">
                        <label for="signup-password" class="control-label sr-only">Password</label>
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="signup-password" class="control-label sr-only">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-md btn-block">REGISTER</button>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <a href="/users" class="btn btn-danger">Back</a>
        </div>
    </div>
</div>
</div>
@stop