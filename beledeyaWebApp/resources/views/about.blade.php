@extends('layouts.main')

@section('content')
<div class="{{(\App::getLocale()=="ar") ? 'main-banner_ar' : 'main-banner' }} wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s"  dir="{{(\App::getLocale()=="ar") ? 'rtl' : 'ltr' }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 align-self-center text-light">
                        <div class="left-content show-up header-text wow  fadeInLeft" data-wow-duration="1s" data-wow-delay="1s" >
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="text-light">{{__('main.title')}}</h2>
                                    <p class="text-light {{(\App::getLocale()=="ar") ? 'text-right' : '' }}">
                                        {{__('main.p_municipality')}}
                                    </p>
                                </div>
                                <div class="col-lg-12">
                                  
                                    <div class="col-lg-12">
                                        <div class="white-button first-button scroll-to-section">
                                            <a href="#contact">{{__('main.More information')}}<i class="fab fa-apple"></i></a>
                                        </div>
                                        <div class="white-button scroll-to-section">
                                            <a href="#contact">{{__('main.contact')}} <i class="fab fa-google-play"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                            <img src="{{ asset('assets/images/slider-dec.png') }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50"  dir="{{(\App::getLocale()=="ar") ? 'rtl' : 'ltr' }}">
    <div class="wrapper wrapper--w790">
<div class="card card-5">
    <div class="card-heading">
        <h2 class="title">{{__('main.PRESENTATION OF THE CITY')}}</h2>
    </div>
    <div class="card-body">
<p>
    {{__('main.p_city')}}
</p>
    </div></div>
       

    </div></div>
@endsection