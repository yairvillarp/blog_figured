@extends('layouts.adminlogin')

@section('content')

    <div class="card-header">{{ __('Reset Password') }}</div>

    <div class="card-body">
        <div class="text-center mb-4">
          <h4>{{ __('Forgot your password?') }}</h4>
          <p>{{ __('Enter your email address and we will send you instructions on how to reset your password.') }}</p>
        </div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
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

            <button type="submit" class="btn btn-primary btn-block">{{ __('Send Password Reset Link') }}</button>
        </form>
    </div>
            
@endsection
