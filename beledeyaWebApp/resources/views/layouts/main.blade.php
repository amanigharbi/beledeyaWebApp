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

    <style>
        .badge {
            display: inline-block;
            padding: 4px 10px;
            font-size: 75%;
            font-weight: 400;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 2px;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        @media (prefers-reduced-motion: reduce) {
            .badge {
                transition: none;
            }
        }

        a.badge:hover,
        a.badge:focus {
            text-decoration: none;
        }

        .badge:empty {
            display: none;
        }

        .btn .badge {
            position: relative;
            top: -1px;
        }

        .badge-pill {
            padding-right: 0.5rem;
            padding-left: 0.5rem;
            border-radius: 10rem;
        }

        .badge-primary {
            color: #fff;
            background-color: #5f76e8;
        }

        a.badge-primary:hover,
        a.badge-primary:focus {
            color: #fff;
            background-color: #3250e2;
        }

        a.badge-primary:focus,
        a.badge-primary.focus {
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(95, 118, 232, 0.5);
        }

        .badge-secondary {
            color: #fff;
            background-color: #6c757d;
        }

        a.badge-secondary:hover,
        a.badge-secondary:focus {
            color: #fff;
            background-color: #545b62;
        }

        a.badge-secondary:focus,
        a.badge-secondary.focus {
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);
        }

        .badge-success {
            color: #fff;
            background-color: #22ca80;
        }

        a.badge-success:hover,
        a.badge-success:focus {
            color: #fff;
            background-color: #1b9e64;
        }

        a.badge-success:focus,
        a.badge-success.focus {
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(34, 202, 128, 0.5);
        }

        .badge-info {
            color: #fff;
            background-color: #5f76e8;
        }

        a.badge-info:hover,
        a.badge-info:focus {
            color: #fff;
            background-color: #3250e2;
        }

        a.badge-info:focus,
        a.badge-info.focus {
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(95, 118, 232, 0.5);
        }

        .badge-warning {
            color: #212529;
            background-color: #fdc16a;
        }

        a.badge-warning:hover,
        a.badge-warning:focus {
            color: #212529;
            background-color: #fcac38;
        }

        a.badge-warning:focus,
        a.badge-warning.focus {
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(253, 193, 106, 0.5);
        }

        .badge-danger {
            color: #fff;
            background-color: #ff4f70;
        }

        a.badge-danger:hover,
        a.badge-danger:focus {
            color: #fff;
            background-color: #ff1c47;
        }

        a.badge-danger:focus,
        a.badge-danger.focus {
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(255, 79, 112, 0.5);
        }

        .badge-light {
            color: #212529;
            background-color: #e8eaec;
        }

        a.badge-light:hover,
        a.badge-light:focus {
            color: #212529;
            background-color: #ccd1d5;
        }

        a.badge-light:focus,
        a.badge-light.focus {
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(232, 234, 236, 0.5);
        }

        .badge-dark {
            color: #fff;
            background-color: #1c2d41;
        }

        a.badge-dark:hover,
        a.badge-dark:focus {
            color: #fff;
            background-color: #0d141d;
        }

        a.badge-dark:focus,
        a.badge-dark.focus {
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(28, 45, 65, 0.5);
        }

        .badge-cyan {
            color: #fff;
            background-color: #01caf1;
        }

        a.badge-cyan:hover,
        a.badge-cyan:focus {
            color: #fff;
            background-color: #019fbe;
        }

        a.badge-cyan:focus,
        a.badge-cyan.focus {
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(1, 202, 241, 0.5);
        }

        .badge-orange {
            color: #212529;
            background-color: #fb8c00;
        }

        a.badge-orange:hover,
        a.badge-orange:focus {
            color: #212529;
            background-color: #c87000;
        }

        a.badge-orange:focus,
        a.badge-orange.focus {
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(251, 140, 0, 0.5);
        }

        .badge-purple {
            color: #fff;
            background-color: #5f76e8;
        }

        a.badge-purple:hover,
        a.badge-purple:focus {
            color: #fff;
            background-color: #3250e2;
        }

        a.badge-purple:focus,
        a.badge-purple.focus {
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(95, 118, 232, 0.5);
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>






</body>

</html>
