@extends('layouts.main')

@section('content')
<div class="fadeIn login-bg" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
        <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                            data-wow-delay="1s">
                                <div class="card w-50 m-auto auth">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <h1 class="text-center">Login</h1>
                                            <div class="form-group">
                                                <input placeholder="Adresse email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <!-- form-group// -->
                                            <div class="form-group">
                                                <input placeholder="Mot de passe" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                                        
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <a href="{{ route('password.request') }}">
                                                        {{ __('Mot de passe oublié?') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="text-center">
                                            <h3 class="text-light font-weight-light">
                                                You don't have an account ? 
                                            <a class="font-weight-bold" href="{{ route('register') }}">
                                                Signup now!
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
