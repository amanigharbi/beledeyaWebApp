@extends('layouts.main')

@section('content')
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 align-self-center text-light">
                        <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="text-light">{{__('main.title')}}</h2>
                                    <p class="text-light">
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
    <div id="services" class="services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                        <h4>{{__('main.title_services_1')}} </h4>
                        <h4>{{__('main.title_services_2')}}</h4>
                        <img src="{{ asset('assets/images/heading-line-dec.png') }}" alt="">
                        <p>{{__('main.title_services_3')}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="service-item first-service">
                        <div class="icon"></div>
                        <h4>{{__('main.Complaints Area')}}</h4>
                        <p>Lorem ipsum dolor consectetur adipiscing elit sedder williamsburg photo booth quinoa and fashion
                            axe.</p>
                        <div class="text-button">
                            <a href="#">{{__('main.access')}} <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-item second-service">
                        <div class="icon"></div>
                        <h4>{{__('main.Access to administrative documents')}}</h4>
                        <p>You are allowed to use the Chain App Dev HTML template. Feel free to modify or edit this layout.
                        </p>
                        <div class="text-button">
                            <a href="{{ route('login') }}">{{__('main.access')}} <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-item third-service">
                        <div class="icon"></div>
                        <h4>{{__('main.Building permit')}}</h4>
                        <p>If this template is beneficial for your work, please support us <a rel="nofollow"
                                href="https://paypal.me/templatemo" target="_blank">a little via PayPal</a>. Thank you.</p>
                        <div class="text-button">
                            <a href="{{ route('login') }}">{{__('main.access')}} <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-item fourth-service">
                        <div class="icon"></div>
                        <h4>{{__('main.Rental tax')}}</h4>
                        <p>Lorem ipsum dolor consectetur adipiscing elit sedder williamsburg photo booth quinoa and fashion
                            axe.</p>
                        <div class="text-button">
                            <a href="#">{{__('main.access')}} <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 test">
                    <div class="service-item five-service">
                        <div class="icon"></div>
                        <h4>{{__('main.Hygiene')}}</h4>
                        <p>Lorem ipsum dolor consectetur adipiscing elit sedder williamsburg photo booth quinoa and fashion
                            axe.</p>
                        <div class="text-button">
                            <a href="#">{{__('main.access')}} <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-item six-service">
                        <div class="icon"></div>
                        <h4>{{__('main.Connection to public networks')}}</h4>
                        <p>Lorem ipsum dolor consectetur adipiscing elit sedder williamsburg photo booth quinoa and fashion
                            axe.</p>
                        <div class="text-button">
                            <a href="{{ route('login') }}">{{__('main.access')}} <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
