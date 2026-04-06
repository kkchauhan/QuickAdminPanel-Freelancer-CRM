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
                <i class="fas fa-key" style="opacity:0.5;margin-right:6px;"></i>{{ trans('global.reset_password') }}
            </p>
            <form method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}
                <input name="token" value="{{ $token }}" type="hidden">
                <div class="form-group">
                    <label for="reset-email2"><i class="fas fa-envelope" style="opacity:0.5;margin-right:6px;font-size:0.8rem;"></i>{{ trans('global.login_email') }}</label>
                    <input type="email" id="reset-email2" name="email" class="form-control" required placeholder="you@example.com">
                    @if($errors->has('email'))
                        <p class="help-block" style="color:var(--crm-danger);margin-top:0.3rem;font-size:0.8rem;">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="reset-pass"><i class="fas fa-lock" style="opacity:0.5;margin-right:6px;font-size:0.8rem;"></i>{{ trans('global.login_password') }}</label>
                    <input type="password" id="reset-pass" name="password" class="form-control" required placeholder="••••••••">
                    @if($errors->has('password'))
                        <p class="help-block" style="color:var(--crm-danger);margin-top:0.3rem;font-size:0.8rem;">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="reset-pass-confirm"><i class="fas fa-lock" style="opacity:0.5;margin-right:6px;font-size:0.8rem;"></i>{{ trans('global.login_password_confirmation') }}</label>
                    <input type="password" id="reset-pass-confirm" name="password_confirmation" class="form-control" required placeholder="••••••••">
                    @if($errors->has('password_confirmation'))
                        <p class="help-block" style="color:var(--crm-danger);margin-top:0.3rem;font-size:0.8rem;">
                            {{ $errors->first('password_confirmation') }}
                        </p>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-check-circle mr-1" style="font-size:0.8rem;"></i>{{ trans('global.reset_password') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection