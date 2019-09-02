@extends('layouts.adminlogin')

@section('content')
<div class="card-header">{{ __('Login') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <div class="form-label-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <label for="email">{{ __('E-Mail Address') }}</label>
                </div>
            </div>

            <div class="form-group">
                <div class="form-label-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="password">{{ __('Password') }}</label>
                </div>
            </div> 

            <div class="form-group">
                <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    {{ __('Remember Me') }}
                </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
        </form>
        <div class="text-center">
            <a class="d-block small" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
        </div>
    </div>
</div>
@endsection
