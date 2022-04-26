<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
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
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out; }
  @media (prefers-reduced-motion: reduce) {
    .badge {
      transition: none; } }
  a.badge:hover, a.badge:focus {
    text-decoration: none; }
  .badge:empty {
    display: none; }

.btn .badge {
  position: relative;
  top: -1px; }

.badge-pill {
  padding-right: 0.5rem;
  padding-left: 0.5rem;
  border-radius: 10rem; }

.badge-primary {
  color: #fff;
  background-color: #5f76e8; }
  a.badge-primary:hover, a.badge-primary:focus {
    color: #fff;
    background-color: #3250e2; }
  a.badge-primary:focus, a.badge-primary.focus {
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(95, 118, 232, 0.5); }

.badge-secondary {
  color: #fff;
  background-color: #6c757d; }
  a.badge-secondary:hover, a.badge-secondary:focus {
    color: #fff;
    background-color: #545b62; }
  a.badge-secondary:focus, a.badge-secondary.focus {
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5); }

.badge-success {
  color: #fff;
  background-color: #22ca80; }
  a.badge-success:hover, a.badge-success:focus {
    color: #fff;
    background-color: #1b9e64; }
  a.badge-success:focus, a.badge-success.focus {
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(34, 202, 128, 0.5); }

.badge-info {
  color: #fff;
  background-color: #5f76e8; }
  a.badge-info:hover, a.badge-info:focus {
    color: #fff;
    background-color: #3250e2; }
  a.badge-info:focus, a.badge-info.focus {
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(95, 118, 232, 0.5); }

.badge-warning {
  color: #212529;
  background-color: #fdc16a; }
  a.badge-warning:hover, a.badge-warning:focus {
    color: #212529;
    background-color: #fcac38; }
  a.badge-warning:focus, a.badge-warning.focus {
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(253, 193, 106, 0.5); }

.badge-danger {
  color: #fff;
  background-color: #ff4f70; }
  a.badge-danger:hover, a.badge-danger:focus {
    color: #fff;
    background-color: #ff1c47; }
  a.badge-danger:focus, a.badge-danger.focus {
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(255, 79, 112, 0.5); }

.badge-light {
  color: #212529;
  background-color: #e8eaec; }
  a.badge-light:hover, a.badge-light:focus {
    color: #212529;
    background-color: #ccd1d5; }
  a.badge-light:focus, a.badge-light.focus {
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(232, 234, 236, 0.5); }

.badge-dark {
  color: #fff;
  background-color: #1c2d41; }
  a.badge-dark:hover, a.badge-dark:focus {
    color: #fff;
    background-color: #0d141d; }
  a.badge-dark:focus, a.badge-dark.focus {
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(28, 45, 65, 0.5); }

.badge-cyan {
  color: #fff;
  background-color: #01caf1; }
  a.badge-cyan:hover, a.badge-cyan:focus {
    color: #fff;
    background-color: #019fbe; }
  a.badge-cyan:focus, a.badge-cyan.focus {
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(1, 202, 241, 0.5); }

.badge-orange {
  color: #212529;
  background-color: #fb8c00; }
  a.badge-orange:hover, a.badge-orange:focus {
    color: #212529;
    background-color: #c87000; }
  a.badge-orange:focus, a.badge-orange.focus {
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(251, 140, 0, 0.5); }

.badge-purple {
  color: #fff;
  background-color: #5f76e8; }
  a.badge-purple:hover, a.badge-purple:focus {
    color: #fff;
    background-color: #3250e2; }
  a.badge-purple:focus, a.badge-purple.focus {
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(95, 118, 232, 0.5); }

</style>
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
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <div class="wrapper wrapper--w790">
        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title">Demande aux branchement au réseaux publics</h2>
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
                <form action="{{ asset('addDemande') }}" method="POST" enctype="multipart/form-data">
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
                                        <input class="input--style-5" type="text" value="{{ old('first_name') }}" name="first_name" required>
                                        <label class="label--desc">Nom</label>
                               
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group-desc">
                                        @error('last_name')
                                        {{ $message }}
                                    @enderror
                                        <input class="input--style-5" type="text" value="{{ old('last_name') }}" name="last_name" required>
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
                                <input class="input--style-5" type="text" name="cin" value="{{ old('cin') }}" required>
                                @error('cin')
                                {{ $message }}
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Email *</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="email" name="email" value="{{ old('email') }}" required>

                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Adresse *</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="adresse" name="adresse" value="{{ old('adresse') }}" required>
                                @error('adresse')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Type branchement *</div>
                        <div class="value">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select class="form-control" name="type" value="{{ old('type') }}">
                                        <option value="" selected>Sélectionner</option>
                                        <option value="Eau">Eau</option>
                                        <option value="Energie">Enérgie</option>
                                        
                                        <option value="Autres branchement">Autres branchement</option>
                                    </select>
                                    @error('type')
                                    {{ $message }}
                                @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Description </div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="description" name="description" value="{{ old('description') }}" >
                            
                            </div>
                        </div>
                    </div>
  
                     
                    </div>
                    <div>
                        <button class="btn btn--radius-2 btn--red" type="submit">Envoyer</button>
                    </div>
                </form>

                {{-- <img class="card-img-top" src="{{asset('storage')}}/{{$reclamation->photo}}" alt="Post image" /> --}}

            </div>
        </div>
    </div>
</div>

<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <div class="wrapper wrapper--w790">
<div class="card card-5">
    <div class="card-heading">
        <h2 class="title">Suivi de demande</h2>
    </div>
    <div class="card-body">
<table class="table">
    <thead>
        <tr class="bg-danger">
            <th>N° demande </th>
            <th> Type </th>
        <th> Date de publication</th>
        <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($res as $r)
        <tr>
            <td>{{ $r->id }}</td>
            <td>{{ $r->type }}</td>
            <td>
                {{ $r->created_at }}
            </td>
            <td>
                @switch($r->status)
                @case('0')
                    <span class="badge badge-danger">New</span>
                @break

                @case('1')
                    <span class="badge badge-warning text-white">In progress</span>
                @break

                @case('2')
                    <span class="badge badge-success text-white">finished</span>
                @break
                @case('3')
                        <span class="badge badge-warning text-white">Rejected</span>
                    @break
            @endswitch
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
    </div></div>
    </div></div>
@endsection