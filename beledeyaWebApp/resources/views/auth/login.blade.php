
@extends('layouts.main')
@section('content')
<div class="fadeIn login-bg" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
        <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                            data-wow-delay="1s">
                                <div class="card w-50 m-auto auth " dir="{{(\App::getLocale()=="ar") ? 'rtl' : 'ltr' }}">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <h1 class="text-center">  {{ __('auth.login') }}</h1>
                                            <div class="form-group">
                                                <input placeholder="{{ __('auth.email') }}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <!-- form-group// -->
                                            <div class="form-group">
                                                <input placeholder="{{ __('auth.password') }}" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                                        
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary btn-block">{{ __('auth.login') }}</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 {{(\App::getLocale()=="ar") ? 'text-left' : 'text-right' }}">
                                                    <a href="{{ route('password.request') }}">
                                                        {{ __('auth.Forget Your Password ?') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="text-center">
                                            <h3 class="text-light font-weight-light">
                                                {{ __('auth.You don’t have an account ?') }}
                                            <a class="font-weight-bold" href="{{ route('register') }}">
                                                {{ __('auth.Sign up') }}
                                            </a>
                                        </h3>
                                        <p>{{__('auth.Or') }}</p>
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
