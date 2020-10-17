@extends('layouts.admin-theme-main-app')

@section('content')
<div class="card-header">
    <h5 class="text-center font-weight-light my-4">{{ __('Reset Password') }}</h5>
</div>

<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="small mb-3 text-muted">Enter your email address and we will send you a link to reset your password.</div>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group">
            <label for="email" class="small mb-1">{{ __('E-Mail Address') }}</label>

            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
            <button type="submit" class="btn btn-primary">
                {{ __('Send Password Reset Link') }}
            </button>

            <a class="btn btn-link" href="{{ route('login') }}">
                <small>{{ __('Return to login') }}</small>
            </a>
        </div>
    </form>
</div>

<div class="card-footer text-center">
    @if (Route::has('register'))
        <div class="small"><a href="{{ route('register') }}">{{ __('Need an account? Sign up!') }}</a></div>
    @endif
</div>
@endsection