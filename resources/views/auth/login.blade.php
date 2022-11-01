@extends('layouts.app')

@section('content')
<div class="container-fluid" style="height: 100vh;">
    <div class="row h-100">
        <div class="col-md-7 p-0">
            <div style="background: url('../assets/img/login-img.png'); background-size: cover; height: 100%"></div>
        </div>
        <div class="col-md-5 p-0">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div style="max-width: 300px; margin: 0 auto;">
                        <label for="email" class="mb-2">{{ __('E-Mail') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror mb-2" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="password" class="mb-2">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror mb-2" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
