@extends('layouts.main')

@section('content')
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

@endsection