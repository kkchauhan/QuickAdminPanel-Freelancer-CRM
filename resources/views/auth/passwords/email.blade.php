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
            <p class="login-box-msg">
                <i class="fas fa-envelope-open-text" style="opacity:0.5;margin-right:6px;"></i>{{ trans('global.reset_password') }}
            </p>
            <form method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="reset-email"><i class="fas fa-envelope" style="opacity:0.5;margin-right:6px;font-size:0.8rem;"></i>{{ trans('global.login_email') }}</label>
                    <input type="email" id="reset-email" name="email" class="form-control" required autofocus placeholder="you@example.com">
                    @if($errors->has('email'))
                        <p class="help-block" style="color:var(--crm-danger);margin-top:0.3rem;font-size:0.8rem;">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-paper-plane mr-1" style="font-size:0.8rem;"></i>{{ trans('global.reset_password') }}
                </button>
            </form>
            <div style="text-align:center; margin-top:1rem;">
                <a href="{{ route('login') }}" style="font-size:0.85rem;">
                    <i class="fas fa-arrow-left" style="opacity:0.5;margin-right:4px;font-size:0.75rem;"></i>Back to login
                </a>
            </div>
        </div>
    </div>
</div>
@endsection