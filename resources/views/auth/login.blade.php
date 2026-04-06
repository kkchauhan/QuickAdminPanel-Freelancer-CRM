@extends('layouts.app')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="#">
            <i class="fas fa-bolt" style="margin-right: 6px;"></i>{{ trans('panel.site_title') }}
        </a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to your workspace</p>
            @if(\Session::has('message'))
                <div class="alert alert-info">
                    <i class="fas fa-info-circle mr-2"></i>{{ \Session::get('message') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="login-email"><i class="fas fa-envelope" style="opacity:0.5;margin-right:6px;font-size:0.8rem;"></i>{{ trans('global.login_email') }}</label>
                    <input type="email" id="login-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus placeholder="you@example.com" name="email" value="{{ old('email', null) }}">
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="login-password"><i class="fas fa-lock" style="opacity:0.5;margin-right:6px;font-size:0.8rem;"></i>{{ trans('global.login_password') }}</label>
                    <input type="password" id="login-password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="••••••••" name="password">
                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <div class="row align-items-center mb-3">
                    <div class="col-7">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">{{ trans('global.remember_me') }}</label>
                        </div>
                    </div>
                    <div class="col-5">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ trans('global.login') }} <i class="fas fa-arrow-right ml-1" style="font-size:0.8rem;"></i>
                        </button>
                    </div>
                </div>
            </form>

            <div style="text-align:center; margin-top:0.5rem;">
                <a href="{{ route('password.request') }}" style="font-size:0.85rem;">
                    <i class="fas fa-key" style="opacity:0.5;margin-right:4px;font-size:0.75rem;"></i>{{ trans('global.forgot_password') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection