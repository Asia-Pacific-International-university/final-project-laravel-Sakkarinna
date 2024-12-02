@extends('layouts.layout')

@section('title', 'Register')

@section('content')
    <div class="container mt-4">
        <h1>Register</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus autocomplete="name">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autocomplete="username">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" class="form-control" required autocomplete="new-password">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
                @if ($errors->has('password_confirmation'))
                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <a class="text-muted" href="{{ route('login') }}">{{ __('Already registered?') }}</a>
                <button type="submit" class="btn btn-primary ms-3">{{ __('Register') }}</button>
            </div>
        </form>
    </div>
@endsection
