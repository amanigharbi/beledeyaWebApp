@extends('layouts.main')
@section('content')
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
        @endif @if (session('error'))
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
                                                <tr class="">
                                                    <th>N° Demande</th>

                                                    <th>Date de publication</th>
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

        </div>
    @endsection
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
