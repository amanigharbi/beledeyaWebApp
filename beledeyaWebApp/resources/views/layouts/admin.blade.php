<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir=" {{(\App::getLocale()=="ar") ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <title>{{__('main.municipality')}}</title>
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">
    <!-- Custom CSS -->
    <link href="{{ asset('admin/assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('admin/dist/css/style.min.css') }}" rel="stylesheet">
    
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <div class="navbar-brand text-center">
                        <!-- Logo icon -->
                        <a href="index.html">
                            {{-- <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="{{ asset('assets/images/logo.png') }}" alt="Menzel Abdelrahmane"
                                    class="dark-logo w-50 p-3" />
                                <!-- Light Logo icon -->
                                <img src="{{ asset('assets/images/logo.png') }}" alt="Menzel Abdelrahmane"
                                    class="light-logo w-50 p-3" />
                            </b> --}}
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text ">
                                <!-- dark Logo text -->
                                <img src="{{ asset('assets/images/logo.png') }}" alt="Menzel Abdelrahmane"
                                class="dark-logo w-50 p-3" />
                                <!-- Light Logo text -->
                                <img src="{{ asset('assets/images/logo.png') }}" alt="Menzel Abdelrahmane"
                                class="light-logo w-50 p-3" />
                            </span>
                        </a>
                    </div>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link" href="javascript:void(0)">
                                <div class="customize-input">
                             
                                    <div class="dropdown show">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{__('main.Language')}} <i class="fa fa-globe"></i>
                                        </a>
                                      
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="{{ asset('/lang') }}/en">{{__('main.en')}} <img src="{{ asset('assets/images/en.gif') }}" alt="English (UK)" title="English (UK)" style="width: auto; height:auto;"></a>
                                            <a class="dropdown-item" href="{{ asset('/lang') }}/ar">{{__('main.ar')}} <img src="{{ asset('assets/images/ar.gif') }}" alt="العربية" title="العربية" style="width: auto; height:auto;"></a>
                                            <a class="dropdown-item" href="{{ asset('/lang') }}/fr">{{__('main.fr')}} <img src="{{ asset('assets/images/fr.png') }}" alt="French (FR)" title="French (FR)" style="width: 20px; height:20px;"></a>
                                        </div>
                                      </div>
                                    

                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="ml-2 d-none d-lg-inline-block"><span>{{__('main.Hello')}},</span> <span
                                        class="text-dark">{{ auth::user()->name }}</span> <i
                                        data-feather="chevron-down" class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="{{ asset('profile_admin') }}"><i data-feather="user"
                                    class="svg-icon mr-2 ml-1"></i>
                                {{__('main.Users')}}</a>
                                <a class="dropdown-item" href="{{ asset('profile_admin') }}/{{ auth::user()->id }}"><i data-feather="settings"
                                        class="svg-icon mr-2 ml-1"></i>
                                    {{__('main.Account Setting')}}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();"><i
                                        data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                        {{__('main.logout')}}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item {{ \Request::is('dashboard') ? 'selected' : '' }}"> <a
                                class="sidebar-link sidebar-link" href="{{ asset('dashboard') }}"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">{{__('main.dashboard')}}</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">{{__('main.client services')}}</span></li>

                        <li class="sidebar-item {{ \Request::is('reclamation*') ? 'selected' : '' }}"> <a
                                class="sidebar-link" href="{{ asset('reclamations') }}" aria-expanded="false"><i
                                    class="icon-shield"></i><span class="hide-menu">{{__('main.complaints')}}
                                </span></a>
                        </li>
                        <li class="sidebar-item {{ \Request::is('document*') ? 'selected' : '' }}"> <a
                            class="sidebar-link" href="{{ asset('document') }}" aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">{{__('main.documents')}}
                            </span></a>
                                </li>
                     
                                    <li class="sidebar-item {{ \Request::is('PermisConstruction*') ? 'selected' : '' }}"> <a class="sidebar-link sidebar-link" href="{{ asset('PermisConstructions') }}"
                                        aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu"> {{__('main.Building permit')}}</span></a></li>
                                            
                                        <li class="sidebar-item {{ \Request::is('ReseauPublic*') ? 'selected' : '' }}"> <a class="sidebar-link sidebar-link" href="{{ asset('ReseauPublic') }}"
                                                aria-expanded="false"><i data-feather="sun" class="feather-icon"></i><span class="hide-menu"> {{__('main.publicNetwork')}}</span></a></li>
                        <li class="list-divider"></li>
                          
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src=" {{ asset('admin/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('admin/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('admin/dist/js/feather.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('admin/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('admin/dist/js/custom.min.js') }}"></script>
    <script src="{{ asset('admin/assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('admin/assets/extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('admin/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('admin/dist/js/pages/dashboards/dashboard1.min.js') }}"></script>
</body>

</html>
