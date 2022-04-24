@extends('layouts.main')

@section('content')

{{-- <div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif --}}
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center  text-light">
                            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2 class="text-light">Bienvenue sur le site officiel de la commune de Menzel Abderrahmen</h2>
                                        <p class=" text-light">Menzel Abderrahmane (arabe : منزل عبد الرحمان) est une ville située
                                             à une soixantaine de kilomètres au nord de Tunis, sur la rive nord du lac de Bizerte. Elle fait partie
                                             de l'agglomération de Bizerte dont elle n'est séparée que de quelques kilomètres...</p>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="white-button first-button scroll-to-section">
                                            <a href="#contact">Plus d'information<i class="fab fa-apple"></i></a>
                                        </div>
                                        <div class="white-button scroll-to-section">
                                            <a href="#contact">contact <i class="fab fa-google-play"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="{{ asset('assets/images/slider-dec.png') }}" alt="">
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
                                        <h4>La commune de <em>MENZEL ABDERRAHMAN </em> met à votre </h4><h4> disposition une variété des <em>services</em> en ligne.</h4>
                                        <img src="{{ asset('assets/images/heading-line-dec.png') }}" alt="">
                                        <p>Dans le cadre d'instaurer une administration électronique , moderne et interactive.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                              <div class="col-lg-3">
                                <div class="service-item first-service">
                                  <div class="icon"></div>
                                  <h4>Espace des Réclamations</h4>
                                  <p>Lorem ipsum dolor consectetur adipiscing elit sedder williamsburg photo booth quinoa and fashion axe.</p>
                                  <div class="text-button">
                                    <a href="{{route('reclamation')}}">Accéder <i class="fa fa-arrow-right"></i></a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3">
                                <div class="service-item second-service">
                                  <div class="icon"></div>
                                  <h4>Accés aux documents administratifs</h4>
                                  <p>You are allowed to use the Chain App Dev HTML template. Feel free to modify or edit this layout.</p>
                                  <div class="text-button">
                                    <a href="{{route('documents')}}">Accéder <i class="fa fa-arrow-right"></i></a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3">
                                <div class="service-item third-service">
                                  <div class="icon"></div>
                                  <h4>Permis de construction</h4>
                                  <p>If this template is beneficial for your work, please support us <a rel="nofollow" href="https://paypal.me/templatemo" target="_blank">a little via PayPal</a>. Thank you.</p>
                                  <div class="text-button">
                                    <a href="{{route('PermisConstruction')}}">Accéder <i class="fa fa-arrow-right"></i></a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3">
                                <div class="service-item fourth-service">
                                  <div class="icon"></div>
                                  <h4>Taxe locative</h4>
                                  <p>Lorem ipsum dolor consectetur adipiscing elit sedder williamsburg photo booth quinoa and fashion axe.</p>
                                  <div class="text-button">
                                    <a href="{{route('taxes')}}">Accéder <i class="fa fa-arrow-right"></i></a>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="col-lg-3 test">
                                <div class="service-item five-service">
                                  <div class="icon"></div>
                                  <h4>Higiène</h4>
                                  <p>Lorem ipsum dolor consectetur adipiscing elit sedder williamsburg photo booth quinoa and fashion axe.</p>
                                  <div class="text-button">
                                    <a href="#">Accéder <i class="fa fa-arrow-right"></i></a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3">
                                <div class="service-item six-service">
                                  <div class="icon"></div>
                                  <h4>Branchement au réseaux publics</h4>
                                  <p>Lorem ipsum dolor consectetur adipiscing elit sedder williamsburg photo booth quinoa and fashion axe.</p>
                                  <div class="text-button">
                                    <a href="{{route('ReseauPublic')}}">Accéder <i class="fa fa-arrow-right"></i></a>
                                  </div>
                                </div>
                              </div>
                              
                            </div>
                          </div>
                    </div>
                

@endsection
