{{-- <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}"> --}}
<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    .register {
        background: -webkit-linear-gradient(left, #c15b5b, #ea9797);
        margin-top: 3%;
        padding: 3%;
    }

    .register-left {
        text-align: center;
        color: #fff;
        margin-top: 4%;
    }

    .register-left input {
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        width: 60%;
        background: #f8f9fa;
        font-weight: bold;
        color: #383d41;
        margin-top: 30%;
        margin-bottom: 3%;
        cursor: pointer;
    }

    .register-right {
        background: #f8f9fa;
        border-top-left-radius: 10% 50%;
        border-bottom-left-radius: 10% 50%;
    }

    .register-left img {
        margin-top: 55%;
        margin-bottom: 5%;
        width: 25%;
        -webkit-animation: mover 2s infinite alternate;
        animation: mover 1s infinite alternate;
    }

    @-webkit-keyframes mover {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-20px);
        }
    }

    @keyframes mover {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-20px);
        }
    }

    .register .register-form {
        padding: 10%;
        margin-top: 10%;
    }

    .btnRegister {
        float: right;
        margin-top: 10%;
        border-radius: 1.5rem;
        padding: 2%;
        background: #d2a3ab;
        color: #fff;
        font-weight: 600;
        width: 50%;
        cursor: pointer;
    }

    .register .nav-tabs {
        margin-top: 2%;
        margin-left: 55%;
        border: none;
        background: #d2a3ab;
        border-radius: 1.5rem;
        width: 28%;
         /* float: left;  */
    }

    .register .nav-tabs .nav-link {
        padding: 2%;
        height: 34px;
        font-weight: 600;
        color: #fff;
        border-top-right-radius: 1.5rem;
        border-bottom-right-radius: 1.5rem;
    }

    .register .nav-tabs .nav-link:hover {
        border: none;
    }

    .register .nav-tabs .nav-link.active {
        width: 100px;
        color: #d2a3ab;
        border: 2px solid #cbb2b6;
        border-top-left-radius: 1.5rem;
        border-bottom-left-radius: 1.5rem;
    }

    .register-heading {
        text-align: center;
        margin-top: 8%;
        margin-bottom: -15%;
        color: #495057;
    }

</style>
<!------ Include the above in your HEAD tag ---------->
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
                                        <h2 class="text-light">Bienvenue sur le site officiel de la commune de Menzel
                                            Abderrahmen</h2>
                                        <p class=" text-light">Menzel Abderrahmane (arabe : منزل عبد الرحمان) est une
                                            ville située
                                            à une soixantaine de kilomètres au nord de Tunis, sur la rive nord du lac de
                                            Bizerte. Elle fait partie
                                            de l'agglomération de Bizerte dont elle n'est séparée que de quelques
                                            kilomètres...</p>
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


    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Bienvenue Dans l'espace Réclamation</h3>

            </div>
            <div class="col-md-9 register-right">

                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link @if ($rec == null) active @endif" id="home-tab" data-toggle="tab"
                            href="#home" role="tab" aria-controls="home" aria-selected="true">Ajouter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($rec != null) active @endif" id="profile-tab"
                            data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                            aria-selected="true">Suivre</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade @if ($rec == null) show active @endif" id="home"
                        role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Ajouter une réclamation</h3>

                        <form action="{{ asset('addReclamation') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row register-form">
                                @if (session('success'))
                                    {{ session('success') }}
                                @endif
                                @if (session('error'))
                                    {{ session('error') }}
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="first_name" placeholder="Prénom *"
                                            value="{{ old('first_name') }}" required />
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
                                        <input type="email" class="form-control" name="email" placeholder="Email *"
                                            value="{{ old('email') }}" required />
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <button class="btnRegister" type="submit">Ajouter</button>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="adresse" placeholder="Adresse "
                                            value="{{ old('adresse') }}" />
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" name="type" value="{{ old('type') }}">
                                            <option class="hidden" selected disabled>Sélectionner Type de
                                                Réclamation</option>
                                            <option value="" selected>Sélectionner</option>
                                            <option value="Administration">Administration</option>
                                            <option value="Construction Anarchique">Construction Anarchique</option>
                                            <option value="Energie">Enérgie</option>
                                            <option value="Eclairage Public">Eclairage Public</option>
                                            <option value="Espaces Verts">Espaces Verts</option>
                                            <option value="Mobilite">Mobilité</option>
                                            <option value="Occupation illegale">Occupation illégale</option>
                                            <option value="Proprete">Propreté</option>
                                            <option value="Sante et Higiene">Santé et Higiène</option>
                                            <option value="Autres Reclamations">Autres Réclamations</option>
                                        </select>
                                        @error('type')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="sujet"
                                            placeholder="Description de réclamation *" value="{{ old('sujet') }}"
                                            required />
                                        @error('sujet')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" name="photo"
                                            placeholder="Joindre une photo" value="{{ old('photo') }}">
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade  @if ($rec != null) show active @endif" id="profile"
                        role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading">Suivre Réclamation</h3>
                        @if (session('success'))
                        {{ session('success') }}
                    @endif
                    @if (session('error'))
                        {{ session('error') }}
                    @endif
                        <div class="row register-form">
                           
                            
                            <div class="col-md-5">
                                <form action="{{ asset('checkReclam') }}" method="GET">
                                    @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="numRec"
                                        placeholder="Numéro Réclamation *" value="{{ old('numRec') }}" required />
                                    @error('numRec')
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

                                @if ($rec != null && !session('error'))
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr class="">
                                            <th>N° réclamation </th>
                                            <th> Type </th>
                                            <th> Date de publication</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $rec->num_rec }}</td>
                                            <td>{{ $rec->type }}</td>
                                            <td>
                                                {{ $rec->created_at }}
                                            </td>
                                            <td>
                                                @switch($rec->status)
                                                    @case('0')
                                                        <span class="badge badge-danger">New</span>
                                                    @break

                                                    @case('1')
                                                        <span class="badge badge-warning text-white">In progress</span>
                                                    @break

                                                    @case('2')
                                                        <span class="badge badge-success text-white">finished</span>
                                                    @break
                                                @endswitch
                                            </td>
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

    {{-- <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item m-2" role="presentation">
                    <button class="btn btn-danger @if ($rec == null) active @endif" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">Nouvelle réclamation</button>
                </li>
                <li class="nav-item m-2" role="presentation">
                    <button class="btn btn-danger @if ($rec != null) active @endif" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">Suivi réclamation</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade  @if ($rec == null)show active @endif" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="card card-5">
                        <div class="card-heading">
                            <h2 class="title">Réclamations</h2>
                        </div>
                        <div class="card-body">
                            <center>
                                @if (session('success'))
                                    {{ session('success') }}
                                @endif
                                @if (session('error'))
                                    {{ session('error') }}
                                @endif
                            </center>
                            <form action="{{ asset('addReclamation') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row m-b-55">
                                    <div class="name">Nom & Prénom *
                                    </div>
                                    <div class="value">
                                        <div class="row row-space">
                                            <div class="col-6">
                                                <div class="input-group-desc">
                                                    @error('first_name')
                                                        {{ $message }}
                                                    @enderror
                                                    <input class="input--style-5" type="text"
                                                        value="{{ old('first_name') }}" name="first_name" required>
                                                    <label class="label--desc">Nom</label>

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group-desc">
                                                    @error('last_name')
                                                        {{ $message }}
                                                    @enderror
                                                    <input class="input--style-5" type="text"
                                                        value="{{ old('last_name') }}" name="last_name" required>
                                                    <label class="label--desc">Prénom</label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Numéro cin *</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" type="text" name="cin" value="{{ old('cin') }}"
                                                required>
                                            @error('cin')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Email</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" type="email" name="email"
                                                value="{{ old('email') }}">

                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Adresse</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" type="adresse" name="adresse"
                                                value="{{ old('adresse') }}">

                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Type Réclamation *</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <div class="rs-select2 js-select-simple select--no-search">
                                                <select class="form-control" name="type" value="{{ old('type') }}">
                                                    <option value="" selected>Sélectionner</option>
                                                    <option value="Administration">Administration</option>
                                                    <option value="Construction Anarchique">Construction Anarchique</option>
                                                    <option value="Energie">Enérgie</option>
                                                    <option value="Eclairage Public">Eclairage Public</option>
                                                    <option value="Espaces Verts">Espaces Verts</option>
                                                    <option value="Mobilite">Mobilité</option>
                                                    <option value="Occupation illegale">Occupation illégale</option>
                                                    <option value="Proprete">Propreté</option>
                                                    <option value="Sante et Higiene">Santé et Higiène</option>
                                                    <option value="Autres Reclamations">Autres Réclamations</option>
                                                </select>
                                                @error('type')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Sujet Réclamation *</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" type="sujet" name="sujet"
                                                value="{{ old('sujet') }}" required>
                                            @error('sujet')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Photo</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input type="file" class="form-control-file" name="photo"
                                                value="{{ old('photo') }}">
                                        </div>
                                    </div>

                                </div>
                                <div>
                                    <br>
                                    <p>Les fichiers doivent peser moins de <b>2 Mo</b>.<br>
                                        Extensions autorisées : <b>gif jpg jpeg png</b>.</p>
                                </div>
                                <div>
                                    <button class="btn btn--radius-2 btn--red" type="submit">Envoyer</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
                <div class="tab-pane fade @if ($rec != null)show active @endif" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card card-5">
                        <div class="card-heading">
                            <h2 class="title">Suivi de réclamation</h2>
                        </div>
                        <div class="card-body">
                            <center>
                                @if (session('success'))
                                    {{ session('success') }}
                                @endif
                                @if (session('error'))
                                    {{ session('error') }}
                                @endif
                            </center>
                            @if ($rec != null && !session('error'))
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr class="">
                                                <th>N° réclamation </th>
                                                <th> Type </th>
                                                <th> Date de publication</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $rec->num_rec }}</td>
                                                <td>{{ $rec->type }}</td>
                                                <td>
                                                    {{ $rec->created_at }}
                                                </td>
                                                <td>
                                                    @switch($rec->status)
                                                        @case('0')
                                                            <span class="badge badge-danger">New</span>
                                                        @break

                                                        @case('1')
                                                            <span class="badge badge-warning text-white">In progress</span>
                                                        @break

                                                        @case('2')
                                                            <span class="badge badge-success text-white">finished</span>
                                                        @break
                                                    @endswitch
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                            <form action="{{ asset('checkReclam') }}" method="GET">
                                @csrf
                                <div class="form-row">
                                    <div class="name">Numéro réclamation *</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" type="text" name="numRec"
                                                value="{{ old('numRec') }}" required>
                                            @error('numRec')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="name">Numéro cin *</div>
                                    <div class="value">
                                        <div class="input-group">
                                            <input class="input--style-5" type="text" name="cin"
                                                value="{{ old('cin') }}" required>
                                            @error('cin')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn--radius-2 btn--red" type="submit">Envoyer</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div> --}}
@endsection
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
