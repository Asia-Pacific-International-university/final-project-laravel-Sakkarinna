@extends('layouts.layout')

@section('title', 'Log in')

@section('content')
    <div class="container mt-4">
        <!-- Session Status -->
        @if(session('status'))
            <div class="alert alert-success mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus autocomplete="username">
                @if ($errors->has('email'))
                    <span class="text-danger mt-2">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" class="form-control" required autocomplete="current-password">
                @if ($errors->has('password'))
                    <span class="text-danger mt-2">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="mb-3 form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                @if (Route::has('password.request'))
                    <a class="text-muted" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                @endif

                <button type="submit" class="btn btn-primary">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </div>
@endsection
