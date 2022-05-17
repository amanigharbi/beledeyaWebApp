<!DOCTYPE html>
<html lang="fr">

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
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ asset('/') }}" class="logo">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="Menzel Abdelrahmane">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{ route('welcome') }}#top"
                                    class="{{ \Request::route()->getName() == 'welcome' ? 'active' : '' }}">Accueil</a>
                            </li>
                            <li class="scroll-to-section"><a href="{{ route('home') }}#services"
                                    class="{{ \Request::is('home*') ? 'active' : '' }}">Services</a></li>
                            <li class="scroll-to-section"><a href="{{ route('documents') }}"
                                    class="{{ \Request::is('documents*') ? 'active' : '' }}">Documents</a></li>
                            <li class="scroll-to-section"><a href="{{ route('reclamation') }}"
                                    class="{{ \Request::is('reclamation*') ? 'active' : '' }}">Réclamations</a>
                            </li>
                            <li class="scroll-to-section"><a href="{{ route('taxes') }}"
                                    class="{{ \Request::is('taxes*') ? 'active' : '' }}">Taxes locatives</a>
                            </li>
                            <li class="scroll-to-section"><a href="{{ route('about') }}"
                                    class="{{ \Request::is('about*') ? 'active' : '' }}">A propos</a></li>

                            @if (!auth::user())
                                <li>
                                    <div class="gradient-button"><a id="modal_trigger" href="{{ route('login') }}"><i
                                                class="fa fa-sign-in-alt"></i> Se connecter</a></div>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Str::length(auth::user()->name) > 8 ? Str::substr(auth::user()->name, 0, 5) . '...' : auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu   text-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                        <li><a class="dropdown-item" href="#"> <i class="fa fa-user">
                                                    Profile</i></a></li>
                                        <li><a class="dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();"><i
                                                    class="fa fa-sign-out-alt">
                                                    {{ __('Logout') }}
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
                            <span>Menu</span>
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
                        <h4 class="chatbox__heading--header">Chat support</h4>
                        <p class="chatbox__description--header">Hi. My name is Sam. How can I help you?</p>

                    </div>
                </div>
                <div class="chatbox__messages">
                    <div>


                    </div>
                </div>
                <div class="chatbox__footer">

                    <input type="text" placeholder="Write a message...">
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
                        <h4>Nos contacts</h4>
                        <p>Rue El Mongi Slim 7035 menzel abdel rahmen</p>
                        <p><a href="#">Tel (+216) 72 570 125/ (+216) 72 571 29</a></p>
                        <p><a href="#">Fax (+216) 72 570 125</a></p>
                        <p><a href="#">communemenzelabderrahmen@gmail.com</a></p>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h4>A propos</h4>
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Documents</a></li>
                        <li><a href="#">Réclamations</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="footer-widget">
                        <h4>Liens Utiles</h4>
                        <ul>
                            <li><a href="https://www.tunisie.gov.tn/index.php?lang=french">Portail du gouvernement
                                    Tunisien</a></li>
                            <li><a href="https://www.interieur.gov.tn/">Ministère de l'Intérieur Tunisien</a></li>
                            <li><a href="https://www.cpscl.com.tn/">Caisses des prêts et de soutien des collectivités
                                    Locales</a></li>
                            <li><a href="https://www.emploi.nat.tn/fo/Fr/global.php">Agence Nationale pour l'Emploi et
                                    le Travail</a></li>
                            <li><a href="https://www.cfad.tn/">Centre de Formation et d'Appui à la Décentralisation</a>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h4>About Our Company</h4>
                        <div class="logo">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore.</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <p>Copyright © 2022 Beledeya Menzel Abd Rahmen. All Rights Reserved.
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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>




</body>

</html>
