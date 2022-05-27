@extends('layouts.main')
@section('content')
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center text-light">
                            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2 class="text-light">Bienvenue sur le site officiel de la commune de Menzel
                                            Abderrahmen</h2>
                                        <p class="text-light">
                                            Menzel Abderrahmane (arabe : منزل عبد الرحمان) est une ville située à une
                                            soixantaine de kilomètres au nord de Tunis, sur la rive nord du lac de Bizerte.
                                            Elle fait partie de l'agglomération de Bizerte
                                            dont elle n'est séparée que de quelques kilomètres...
                                        </p>
                                    </div>
                                    <div class="col-lg-12">

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
    @if (session('success') && session('permisConsId'))
        <script>
            swal({
                title: "Good job!",
                text: "{{ Session::get('success') }}",
                icon: "success",
                button: "download pdf",
                dangerMode: true
            }).then((value) => {
                open("{{ asset('downPdfPermis') }}/{{ session('permisConsId') }}");
            });
        </script>
        @endif 
        @if (session('success') && session('permisConsId') && session('permisConsIdAr'))
        <script>
            swal({
                title: "Good job!",
                text: "{{ Session::get('success') }}",
                icon: "success",
                button: "download pdf",
                dangerMode: true
            }).then((value) => {
                open("{{ asset('downPdfPermisAr') }}/{{ session('permisConsId') }}");
            });
        </script>
        @endif
        @if (session('error'))
            <script>
                swal({
                    title: "OPS!",
                    text: "{{ Session::get('error') }}",
                    icon: "warning",
                    dangerMode: true
                });
            </script>
        @endif
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="https://i.ibb.co/52TKsdc/construction-removebg-preview.png" alt="construction">

                    <h3>Bienvenue Dans l'espace d'autorisation de batir</h3>
                </div>
                <div class="col-md-9 register-right">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Ajouter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="true">Suivre</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Ajouter une Demande d'autorisation de batir</h3>

                            <form action="{{ asset('addDemandeConst') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="first_name"
                                                placeholder="Prénom *" value="{{ old('first_name') }}" required />
                                            @error('first_name')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="last_name" placeholder="Nom *"
                                                value="{{ old('last_name') }}" required />
                                            @error('last_name')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="cin" placeholder="Cin *"
                                                value="{{ old('cin') }}" required />
                                            @error('cin')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Email "
                                                value="{{ old('email') }}" />
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <button class="btnRegister" type="submit">Ajouter</button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="adresse"
                                                placeholder="Adresse * " value="{{ old('adresse') }}" required />
                                            @error('adresse')
                                                {{ $message }}
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="surface" placeholder="Surface *"
                                                value="{{ old('surface') }}" required />
                                            @error('surface')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="maxl">
                                            <label> Le terrain jouxte-t-il une propriété publique?</label><br />
                                            <label class="radio inline">
                                                <input type="radio" name="prop" value="oui" checked />
                                                <span> Oui </span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="prop" value="non" />
                                                <span>Non </span>
                                            </label>
                                            @error('prop')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <h3 class="register-heading">Suivre Demande d'autorisation de batir</h3>

                            <div class="row register-form">
                                <div class="col-md-5">
                                    <form action="{{ asset('checkAutorisation') }}" method="GET">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="num_autor"
                                                placeholder="Numéro Demande d'autorisation *"
                                                value="{{ old('num_autor') }}" required />
                                            @error('num_autor')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="cin" placeholder="Numéro CIN *"
                                                value="{{ old('cin') }}" required />
                                            @error('cin')
                                                {{ $message }}
                                            @enderror
                                        </div>

                                        <button class="btnRegister" type="submit">Suivre</button>
                                    </form>
                                </div>
                                <div class="col-md-7">
                                    @if ($autorisation != null && !session('error'))
                                        <table class="table">
                                            <thead class="thead-light">
                                                <tr class="text-center">
                                                    <th>N° Demande</th>
                                                    <th>Date de publication</th>
                                                    <th>Status</th>
                                                    @if ($autorisation->status > 1)
                                                        <th>Document</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-center">
                                                    <td>{{ $autorisation->num_autor }}</td>

                                                    <td>
                                                        {{ $autorisation->created_at }}
                                                    </td>
                                                    <td>
                                                        @switch($autorisation->status)
                                                            @case('0')
                                                                <span class="badge badge-danger">New</span>
                                                            @break

                                                            @case('1')
                                                                <span class="badge badge-warning text-white">In progress</span>
                                                            @break

                                                            @case('2')
                                                                <span class="badge badge-success text-white">Accepted</span>
                                                            @break

                                                            @case('3')
                                                                <span class="badge badge-danger text-white">Rejected</span>
                                                            @break
                                                        @endswitch
                                                    </td>
                                                    @if ($autorisation->status >1) 
                                                        <td><button type="submit" class="" onclick="getPdf();"><i
                                                            class="fas fa-eye"></i></button>
                                                        </td>
                                                        <script>
                                                            function getPdf(){
                                                                
                                                                open("{{ asset('downPdfDecision') }}/{{ $autorisation ->id }}");
                                                            }
                                                            </script>
                                                    @endif
                                                </tr>
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    @endsection
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
