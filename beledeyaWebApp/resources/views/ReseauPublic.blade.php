{{-- <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}"> --}}
<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
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

    .register-left button {
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        width: 60%;
        background: #f8f9fa;
        font-weight: bold;
        color: #383d41;
        margin-top: 5%;
        margin-bottom: 45%;
        cursor: pointer;
    }

    .register-right {
        background: #f8f9fa;
        border-top-left-radius: 10% 50%;
        border-bottom-left-radius: 10% 50%;
    }

    .register-left img {
        margin-top: 70%;
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
        float: left;
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

    .table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px 0;
  border-radius:1px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
    }
 .table-title {        
  padding-bottom: 15px;
     background: linear-gradient(40deg, #b41232, #ff056d) !important;
  color: #fff;
  padding: 16px 30px;
  margin: -20px -25px 10px;
  border-radius: 1px 1px 0 0;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
    }
    .table-title h2 {
  margin: 5px 0 0;
  font-size: 24px;
 }

 
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
  padding: 12px 15px;
  vertical-align: middle;
  
    }
 table.table tr th:first-child {
  width: 60px;
 }
 table.table tr th:last-child {
  width: 100px;
 }
    table.table-striped tbody tr:nth-of-type(odd) {
     background-color: #fcfcfc;
 }
 table.table-striped.table-hover tbody tr:hover {
  background: #f5f5f5;
 }
   
 .modal .modal-footer {
  background: #ecf0f1;
  border-radius: 0 0 1px 1px;
 }
    .modal .modal-title {
        display: inline-block;
    }
 .modal .form-control {
  border-radius: 1px;
  box-shadow: none;
  border-color: #dddddd;
 }
 
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
@if ((session('success')) && (session('resId')))
<script>
   swal({  title: "Good job!",
text: "{{ Session::get('success') }}",
icon: "success",
button: "download pdf",
dangerMode: true,

}).then((value) => {
open("{{asset('downPdfRes')}}/{{session('resId')}}");
});
</script>
@endif 

  
  
  @if (session('error'))
  <script>
    swal({  title: "OPS!",
text: "{{ Session::get('error') }}",
icon: "warning",
dangerMode: true,
  }); 
</script>
  @endif
  
 <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://i.ibb.co/bb1YsqB/res-Public-removebg-preview.png" alt="res-Public-removebg-preview" />
  
                <h3>Bienvenue Dans l'espace de branchement aux réseaux publics</h3>
                <button type="button"  data-toggle="modal" data-target="#myModal">
                    Suivre les demandes
                </button>
            </div>
            <div class="col-md-9 register-right">

       
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade  show active  " id="home"
                        role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Ajouter une demande</h3>

                        <form action="{{ asset('addDemande') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row register-form">
                            
                      
                
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
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="adresse" placeholder="Adresse "
                                            value="{{ old('adresse') }}" />
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" name="type" value="{{ old('type') }}">
                                            <option class="hidden" selected disabled>Sélectionner Type de
                                                branchement</option>
                                            <option value="Sonede">Sonede</option>
                                            <option value="Steg ">Steg </option>
                                       
                                        </select>
                                        @error('type')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="description"
                                            placeholder="Description de branchement *" value="{{ old('description') }}"
                                            required />
                                        @error('description')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <button class="btnRegister" type="submit">Ajouter</button>
                                </div>

                            </div>
                        </form>
                    </div>
           
                
                    </div>
                      
                    </div>
                 
                </div>
            </div> 
        

    </div>
</div>

    <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header table-title">
            <h2>Suivre <b>les demandes</b></h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body" style="width: auto">
            <table class="table table-striped table-hover">
      <thead>
        <tr>
            <th>Numéro demande </th>
            <th> Type </th>
            <th> Date de publication</th>
            <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($res as $r)
        <tr>
            <td>{{ $r->num_branch }}</td>
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
                        <span class="badge badge-success text-white">Accepted</span>
                    @break
                    @case('3')
                    <span class="badge badge-danger text-white">Rejected</span>
                @break
                @endswitch
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
  </div>
  </div>
@endsection
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>