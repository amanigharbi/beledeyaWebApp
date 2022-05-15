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
        margin-top: 50%;
        margin-bottom: 3%;
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
        margin-left: 45%;
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
@if ((session('success')) && (session('permisConsId')))
<script>
   swal({  title: "Good job!",
text: "{{ Session::get('success') }}",
icon: "success",
button: "download pdf",
dangerMode: true,

}).then((value) => {
open("{{asset('downPdfPermis')}}/{{session('permisConsId')}}");
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
            <img src="https://i.ibb.co/X7CDsy0/logo4.jpg" alt="construction" />
            <h3>Bienvenue Dans l'espace d'autorisation de batir</h3>

        </div>
        <div class="col-md-9 register-right">

            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link @if ($autorisation == null) active @endif" id="home-tab" data-toggle="tab"
                        href="#home" role="tab" aria-controls="home" aria-selected="true">Ajouter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if ($autorisation != null) active @endif" id="profile-tab"
                        data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                        aria-selected="true">Suivre</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade @if ($autorisation == null) show active @endif" id="home"
                    role="tabpanel" aria-labelledby="home-tab">
          
                    <h3 class="register-heading">Ajouter une Demande d'autorisation de batir</h3>
            
                    <form action="{{ asset('addDemandeConst') }}" method="POST" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" name="adresse" placeholder="Adresse * "
                                        value="{{ old('adresse') }}" required/>
                                        @error('adresse')
                                        {{ $message }}
                                    @enderror
                                    </div>

                               
                                <div class="form-group">
                                    <input type="text" class="form-control" name="surface"
                                        placeholder="Surface *" value="{{ old('surface') }}"
                                        required />
                                    @error('surface')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="maxl">
                                    <label> Le terrain jouxte-t-il une propriété publique?</label><br>
                                    <label class="radio inline">
                                    
                                        <input type="radio" name="prop" value="oui" checked>
                                        <span> Oui </span> 
                                    </label>
                                    <label class="radio inline"> 
                                        <input type="radio" name="prop" value="non">
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
                <div class="tab-pane fade  @if ($autorisation != null) show active @endif" id="profile"
                    role="tabpanel" aria-labelledby="profile-tab">
                    <h3 class="register-heading">Suivre Demande d'autorisation de batir</h3>
               
                    <div class="row register-form">
                       
                        
                        <div class="col-md-5">
                            <form action="{{ asset('checkAutorisation') }}" method="GET">
                                @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="num_autor"
                                    placeholder="Numéro Demande d'autorisation *" value="{{ old('num_autor') }}" required />
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
                                    <tr class="">
                                        <th>N° Demande </th>
                                  
                                        <th> Date de publication</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
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

@endsection
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>