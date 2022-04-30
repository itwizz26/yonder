@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Please login or register below') }}
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <form method="POST" action="{{ route('login') }}" class="col-lg-6">
                                @csrf
                                <div class="mb-2">
                                    <label class="form-label" for="email">{{ __('Username') }}</label>
                                    <input placeholder="e.g. john@wick.com" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <label class="form-label" for="password">{{ __('Password') }}</label>
                                        </div>
                                    </div>
                                    <input placeholder="********" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                        <div class="mb-2">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" class="small text-muted">Forgot password?</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <button type="submit" class="btn btn-secondary w-full">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                        <div class="my-6">
                                            <small>{{ __('Do not have an account yet?') }}</small>
                                            <a href="{{ route('register') }}" class="text-warning text-sm font-semibold">{{ __('Sign up') }}</a>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
