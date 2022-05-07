<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
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
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item m-2" role="presentation">
                    <button class="btn btn-danger @if($rec==null) active @endif" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">Nouvelle réclamation</button>
                </li>
                <li class="nav-item m-2" role="presentation">
                    <button class="btn btn-danger @if($rec!=null) active @endif" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">Suivi réclamation</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade  @if($rec==null)show active @endif" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
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

                            {{-- <img class="card-img-top" src="{{asset('storage')}}/{{$reclamation->photo}}" alt="Post image" /> --}}

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade @if($rec!=null)show active @endif" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
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
                            @if($rec!=null && !session('error'))
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
    </div>
@endsection
