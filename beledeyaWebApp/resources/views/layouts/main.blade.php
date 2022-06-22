<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"/>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>commune menzel abderrahmen</title>
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-chain-app-dev.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <style>

        .lang a {
            text-decoration: none;
            color: black!important;
            font-size: medium;
        }
        
         .lang a:hover {
            color: rgb(170, 76, 76)!important;
        }
        
        .lang .active {
            color: #981b1b !important;
            font-weight: bold;
        }
        
        </style>
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <div class="lang">
                            <a href="{{ asset('/lang') }}/en" class="{{(\App::getLocale()=="en") ? 'active' : '' }}">{{__('main.en')}} </a>|
                            <a href="{{ asset('/lang') }}/ar" class="{{(\App::getLocale()=="ar") ? 'active' : '' }}"> {{__('main.ar')}} </a>|
                            <a href="{{ asset('/lang') }}/fr" class="{{(\App::getLocale()=="fr") ? 'active' : '' }}"> {{__('main.fr')}}</a>
                        </div>
                        {{-- <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Language <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ asset('/lang') }}/en"><img src="{{asset('img/us.png')}}" width="30px" height="20x"> English</a>
                                    <a class="dropdown-item" href="{{ asset('/lang') }}/ar"><img src="{{asset('img/ar.png')}}" width="30px" height="20x"> عربية</a>
                                    <a class="dropdown-item" href="{{ asset('/lang') }}/fr"><img src="{{asset('img/fr.png')}}" width="30px" height="20x"> Français</a>
  
                                </div>
                            </li>
                        </ul> --}}
                        <!-- ***** Logo Start ***** -->
                       
                        <a href="{{ asset('/') }}" class="logo">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="Menzel Abdelrahmane">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{ route('welcome') }}#top"
                                    class="{{ \Request::route()->getName() == 'welcome' ? 'active' : '' }}">{{__('main.home')}}</a>
                            </li>
                            <li class="scroll-to-section"><a href="{{ route('home') }}#services"
                                    class="{{ \Request::is('home*') ? 'active' : '' }}">{{__('main.services')}}</a></li>
                            <li class="scroll-to-section"><a href="{{ route('documents') }}"
                                    class="{{ \Request::is('documents*') ? 'active' : '' }}">{{__('main.documents')}}</a></li>
                            <li class="scroll-to-section"><a href="{{ route('reclamation') }}"
                                    class="{{ \Request::is('reclamation*') ? 'active' : '' }}">{{__('main.complaints')}}</a>
                            </li>
                            <li class="scroll-to-section"><a href="{{ route('ReseauPublic') }}"
                                    class="{{ \Request::is('ReseauPublic*') ? 'active' : '' }}">{{__('main.publicNetwork')}}</a>
                            </li>
                            <li class="scroll-to-section"><a href="{{ route('about') }}"
                                    class="{{ \Request::is('about*') ? 'active' : '' }}">{{__('main.about')}}</a></li>

                            @if (!auth::user())
                                <li>
                                    <div class="gradient-button"><a id="modal_trigger" href="{{ route('login') }}"><i
                                                class="fa fa-sign-in-alt"></i> {{__('main.log in')}}</a></div>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Str::length(auth::user()->name) > 8 ? Str::substr(auth::user()->name, 0, 5) . '...' : auth::user()->name }}
                                    </a>
                                 
                                    <ul class="dropdown-menu   text-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                        <li><a class="dropdown-item" href="{{ asset('profile') }}/{{ auth::user()->id }}"> <i class="fa fa-user">
                                            {{__('main.profile')}}</i></a></li>
                                        <li><a class="dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();"><i
                                                    class="fa fa-sign-out-alt">
                                                    {{ __('main.logout') }}
                                                </i></a></li>
                                    </ul>
                                   
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            @endif
                         
                        </ul>
                        <a class='menu-trigger'>
                            <span>{{__('main.menu')}}</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
  
    @yield('content')
    <div class="container">
        <div class="chatbox">
            <div class="chatbox__support">
                <div class="chatbox__header">
                    <div class="chatbox__image--header">
                        <img src="https://img.icons8.com/color/48/000000/circled-user-female-skin-type-5--v1.png"
                            alt="image">
                    </div>
                    <div class="chatbox__content--header">
                        <h4 class="chatbox__heading--header">{{__('main.Support chat')}}</h4>
                        <p class="chatbox__description--header">{{__('main.Hello, welcome to our chat! Go ahead and send me a message')}}</p>

                    </div>
                </div>
                <div class="chatbox__messages">
                    <div>


                    </div>
                </div>
               
                <div class="chatbox__footer">

                    <input type="text" id="myTextarea" placeholder="{{__('main.Write your message')}}">
                    <button id="btnSend" class="chatbox__send--footer_send send__button_integration"><i class="fa fa-paper-plane"
                        aria-hidden="true"></i></button>
                    <button id="button" class="chatbox__send--footer send__button"><i class="fa fa-microphone"
                            aria-hidden="true"></i></button>
                </div>
            </div>
            <div class="chatbox__button">
                <button><img src="{{ asset('assets/images/chatbox-icon.svg') }}" /></button>
            </div>
        </div>
    </div>
    <footer id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h4>{{__('main.Our contacts')}}</h4>
                        <p>{{__('main.adr')}}</p>
                        <p><a href="#">{{__('main.tel')}}</a></p>
                        <p><a href="#">{{__('main.fax')}}</a></p>
                        <p><a href="#">communemenzelabderrahmen@gmail.com</a></p>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h4>{{__('main.about')}}</h4>
                        <li><a href="{{ route('welcome') }}#top">{{__('main.home')}}</a></li>
                        <li><a href="{{ route('home') }}#services">{{__('main.services')}}</a></li>
                        <li><a href="{{ route('documents') }}">{{__('main.documents')}}</a></li>
                        <li><a href="{{ route('reclamation') }}">{{__('main.complaints')}}</a></li>
                        <li><a href="{{ route('ReseauPublic') }}">{{__('main.publicNetwork')}}</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="footer-widget">
                        <h4>{{__('main.Useful links')}}</h4>
                        <ul>
                            <li><a href="https://www.tunisie.gov.tn/index.php?lang=french">{{__('main.Tunisian government portal')}}</a></li>
                            <li><a href="https://www.interieur.gov.tn/">{{__('main.Tunisian Ministry of Interior')}}</a></li>
                            <li><a href="https://www.cpscl.com.tn/">{{__('main.Local authorities loan and support funds')}}</a></li>
                            <li><a href="https://www.emploi.nat.tn/fo/Fr/global.php">{{__('main.National Agency for Employment and Labor')}}</a></li>
                            <li><a href="https://www.cfad.tn/">{{__('main.Decentralization Training and Support Center')}}</a>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h4>{{__('main.About Our Company')}}</h4>
                        <div class="logo">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore.</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <p>{{__('main.Copyright © 2022 Beledeya Menzel Abd Rahmen. All Rights Reserved')}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/animation.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.js') }}"></script>
    <script src="{{ asset('assets/js/popup.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/app_integration.js') }}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>




</body>

</html>
