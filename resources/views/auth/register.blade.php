@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Client registration') }}
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <form method="POST" action="{{ route('register') }}" class="col-lg-6">
                                @csrf
                                <div class="mb-2">
                                    <label class="form-label" for="email">{{ __('Company name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label class="form-label" for="email">{{ __('eMail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label class="form-label" for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label class="form-label" for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <div class="mb-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <button type="submit" class="btn btn-secondary w-full">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                        <div class="my-6">
                                            <small>{{ __('Have an account already?') }}</small>
                                            <a href="{{ route('login') }}" class="text-warning text-sm font-semibold">{{ __('Sign In') }}</a>
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
