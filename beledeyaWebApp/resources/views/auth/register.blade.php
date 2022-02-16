@extends('layouts.main')

@section('content')
<div class="fadeIn login-bg" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
        <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                            data-wow-delay="1s">
                                <div class="card w-50 m-auto auth">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <h1 class="text-center">Sign Up</h1>
                                            <div class="form-group offset-md-3">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
                        
                                                <div class="col-md-8">
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                        
                                            <div class="form-group offset-md-3">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse Email') }}</label>
                        
                                                <div class="col-md-8">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                        
                                            <div class="form-group offset-md-3">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>
                        
                                                <div class="col-md-8 ">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                        
                                            <div class="form-group offset-md-3">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer Mot de passe') }}</label>
                        
                                                <div class="col-md-8">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>
                        
                                            <div class="form-group mb-0">
                                                <div class="col-md-8 offset-md-5 ">
                                                    <button type="submit" class="btn btn-primary btn-block ">
                                                        {{ __('Inscrire') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="text-center">
                                            <h3 class="text-light font-weight-light">
                                                You have an account ? 
                                            <a class="font-weight-bold" href="{{ route('login') }}">
                                                Signin now!
                                            </a>
                                        </h3>
                                        <p>OR</p>
                                        <div class="row social-media w-25 m-auto">
                                            <div class="col-6">
                                                <a href="{{ url('auth/facebook') }}"><i class="fab fa-facebook"></i></a>
                                            </div>
                                            <div class="col-6">
                                                <a href="{{ url('auth/google') }}"><i class="fab fa-google"></i></a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
    </div>
</div>
@endsection
