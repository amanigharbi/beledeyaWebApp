@extends('layouts.main')

@section('content')



                   
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
                                  <h4>Autorisation de batir</h4>
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
