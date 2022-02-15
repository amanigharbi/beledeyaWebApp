<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <title>commune menzel abderrahmen</title>
    <link rel = "icon" href = 
        "{{ asset('assets/images/logo.png') }}" 
                type = "image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-chain-app-dev.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/chat.css') }}">

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
                        <a href="index.html" class="logo">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="Chain App Dev">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Accueil</a></li>
                            <li class="scroll-to-section"><a href="#services">Services</a></li>
                            <li class="scroll-to-section"><a href="#pricing">Documents</a></li>
                            <li class="scroll-to-section"><a href="#newsletter">Réclamations</a></li>
                            <li class="scroll-to-section"><a href="#about">A propos</a></li>
                            <li>
                                <div class="gradient-button"><a id="modal_trigger" href="#modal"><i
                                            class="fa fa-sign-in-alt"></i> Se connecter</a></div>
                            </li>
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

    <div id="modal" class="popupContainer" style="display:none;">
        <div class="popupHeader">
            <span class="header_title">Login</span>
            <span class="modal_close"><i class="fa fa-times"></i></span>
        </div>

        <section class="popupBody">
            <!-- Social Login -->
            <div class="social_login">
                <div class="">
                    <a href="#" class="social_box fb">
                        <span class="icon"><i class="fab fa-facebook"></i></span>
                        <span class="icon_title">Connect with Facebook</span>

                    </a>

                    <a href="#" class="social_box google">
                        <span class="icon"><i class="fab fa-google-plus"></i></span>
                        <span class="icon_title">Connect with Google</span>
                    </a>
                </div>

                <div class="centeredText">
                    <span>Or use your Email address</span>
                </div>

                <div class="action_btns">
                    <div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
                    <div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
                </div>
            </div>

            <!-- Username & Password Login form -->
            <div class="user_login">
                <form>
                    <label>Email / Username</label>
                    <input type="text" />
                    <br />

                    <label>Password</label>
                    <input type="password" />
                    <br />

                    <div class="checkbox">
                        <input id="remember" type="checkbox" />
                        <label for="remember">Remember me on this computer</label>
                    </div>

                    <div class="action_btns">
                        <div class="one_half"><a href="#" class="btn back_btn"><i
                                    class="fa fa-angle-double-left"></i> Back</a></div>
                        <div class="one_half last"><a href="#" class="btn btn_red">Login</a></div>
                    </div>
                </form>

                <a href="#" class="forgot_password">Forgot password?</a>
            </div>

            <!-- Register Form -->
            <div class="user_register">
                <form>
                    <label>Full Name</label>
                    <input type="text" />
                    <br />

                    <label>Email Address</label>
                    <input type="email" />
                    <br />

                    <label>Password</label>
                    <input type="password" />
                    <br />

                    <div class="checkbox">
                        <input id="send_updates" type="checkbox" />
                        <label for="send_updates">Send me occasional email updates</label>
                    </div>

                    <div class="action_btns">
                        <div class="one_half"><a href="#" class="btn back_btn"><i
                                    class="fa fa-angle-double-left"></i> Back</a></div>
                        <div class="one_half last"><a href="#" class="btn btn_red">Register</a></div>
                    </div>
                </form>
            </div>
        </section>
    </div>

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
                    <a href="#">Accéder <i class="fa fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="service-item second-service">
                  <div class="icon"></div>
                  <h4>Accés aux documents administratifs</h4>
                  <p>You are allowed to use the Chain App Dev HTML template. Feel free to modify or edit this layout.</p>
                  <div class="text-button">
                    <a href="#">Accéder <i class="fa fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="service-item third-service">
                  <div class="icon"></div>
                  <h4>Permis de construction</h4>
                  <p>If this template is beneficial for your work, please support us <a rel="nofollow" href="https://paypal.me/templatemo" target="_blank">a little via PayPal</a>. Thank you.</p>
                  <div class="text-button">
                    <a href="#">Accéder <i class="fa fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="service-item fourth-service">
                  <div class="icon"></div>
                  <h4>Taxe locative</h4>
                  <p>Lorem ipsum dolor consectetur adipiscing elit sedder williamsburg photo booth quinoa and fashion axe.</p>
                  <div class="text-button">
                    <a href="#">Accéder <i class="fa fa-arrow-right"></i></a>
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
                    <a href="#">Accéder <i class="fa fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
    </div>
    <div class="chatFloat">
        <div class="fabs">
            <div class="chat">
                <div class="chat_header text-center">
                    <div class="chat_option">
                        <span id="chat_head">ChatBot</span>
                    </div>
                </div>
                <div class="chat_body chat_login">
                    <p>We make it simple and seamless for businesses and people to talk to each other. Ask us anything
                    </p>
                </div>

                <div class="fab_field">
                    <a id="fab_send" class="fab"><i class="fa fa-microphone"></i></a>
                    <textarea id="chatSend" name="chat_message" placeholder="Send a message"
                        class="chat_field chat_message"></textarea>
                </div>
            </div>
            <a id="prime" class="fab"><i class="prime zmdi zmdi-comment-outline"></i></a>
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
                            <li><a href="https://www.tunisie.gov.tn/index.php?lang=french">Portail du gouvernement Tunisien</a></li>
                            <li><a href="https://www.interieur.gov.tn/">Ministère de l'Intérieur Tunisien</a></li>
                            <li><a href="https://www.cpscl.com.tn/">Caisses des prêts et de soutien des collectivités Locales</a></li>
                            <li><a href="https://www.emploi.nat.tn/fo/Fr/global.php">Agence Nationale pour l'Emploi et le Travail</a></li>
                            <li><a href="https://www.cfad.tn/">Centre de Formation et d'Appui à la Décentralisation</a></li>
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
                        <p>Copyright © 2022 Amani Gharbi. All Rights Reserved.
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
    <script src="{{ asset('assets/js/chat.js') }}"></script>
</body>

</html>
