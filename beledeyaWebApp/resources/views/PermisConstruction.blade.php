@extends('layouts.main')
@section('content')
<div class="{{(\App::getLocale()=="ar") ? 'main-banner_ar' : 'main-banner' }} wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s"  dir="{{(\App::getLocale()=="ar") ? 'rtl' : 'ltr' }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 align-self-center text-light">
                        <div class="left-content show-up header-text wow  fadeInLeft" data-wow-duration="1s" data-wow-delay="1s" >
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="text-light">{{__('main.title')}}</h2>
                                    <p class="text-light {{(\App::getLocale()=="ar") ? 'text-right' : '' }}">
                                        {{__('main.p_municipality')}}
                                    </p>
                                </div>
                                <div class="col-lg-12">
                                  
                                    <div class="col-lg-12">
                                        <div class="white-button first-button scroll-to-section">
                                            <a href="#contact">{{__('main.More information')}}<i class="fab fa-apple"></i></a>
                                        </div>
                                        <div class="white-button scroll-to-section">
                                            <a href="#contact">{{__('main.contact')}} <i class="fab fa-google-play"></i></a>
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
                title: "{{__('main.Good job!')}}",
                text: "{{ Session::get('success') }}",
                icon: "success",
                button: "{{__('main.download pdf')}}",
                dangerMode: true
            }).then((value) => {
                open("{{ asset('downPdfPermis') }}/{{ session('permisConsId') }}");
            });
        </script>
        @endif 
        @if (session('success') && session('permisConsId') && session('permisConsIdAr'))
        <script>
            swal({
                title: "{{__('main.Good job!')}}",
                text: "{{ Session::get('success') }}",
                icon: "success",
                button: "{{__('main.download pdf')}}",
                dangerMode: true
            }).then((value) => {
                open("{{ asset('downPdfPermisAr') }}/{{ session('permisConsId') }}");
            });
        </script>
        @endif
        @if (session('error'))
            <script>
                swal({
                    title: "{{__('main.ops')}}",
                    text: "{{ Session::get('error') }}",
                    icon: "warning",
                    dangerMode: true
                });
            </script>
        @endif
        <div class="container register"  dir="{{(\App::getLocale()=="ar") ? 'rtl' : 'ltr' }}">
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="https://i.ibb.co/52TKsdc/construction-removebg-preview.png" alt="construction">

                    <h3>{{__('main.Welcome to the building permit area')}}</h3>
                </div>
                <div class="col-md-9 register-right">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">{{__('main.add')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="true">{{__('main.track')}}</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">{{__('main.Add a building permit request')}}</h3>

                            <form action="{{ asset('addDemandeConst') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="first_name"
                                                placeholder="{{__('main.firstname')}} *" value="{{ old('first_name') }}" required />
                                            @error('first_name')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="last_name" placeholder="{{__('main.lastname')}} *"
                                                value="{{ old('last_name') }}" required />
                                            @error('last_name')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="cin" placeholder="{{__('main.ID card')}} *"
                                                value="{{ old('cin') }}" required />
                                            @error('cin')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="{{__('main.email')}} "
                                                value="{{ old('email') }}" />
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <button class="btnRegister" type="submit">{{__('main.add')}}</button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="adresse"
                                                placeholder="{{__('main.address')}} * " value="{{ old('adresse') }}" required />
                                            @error('adresse')
                                                {{ $message }}
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="surface" placeholder="{{__('main.Surface')}} *"
                                                value="{{ old('surface') }}" required />
                                            @error('surface')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="maxl">
                                            <label> {{__('main.Does the land adjoin public property?')}}</label><br />
                                            <label class="radio inline">
                                                <input type="radio" name="prop" value="{{__('main.Yes')}}" checked />
                                                <span> {{__('main.Yes')}} </span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="prop" value="{{__('main.No')}}" />
                                                <span>{{__('main.No')}} </span>
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
                            <h3 class="register-heading">{{__('main.Track Application for building permit')}}</h3>

                            <div class="row register-form">
                                <div class="col-md-5">
                                    <form action="{{ asset('checkAutorisation') }}" method="GET">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="num_autor"
                                                placeholder="{{__('main.Authorization request number')}} *"
                                                value="{{ old('num_autor') }}" required />
                                            @error('num_autor')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="cin" placeholder="{{__('main.Cin number')}} *"
                                                value="{{ old('cin') }}" required />
                                            @error('cin')
                                                {{ $message }}
                                            @enderror
                                        </div>

                                        <button class="btnRegister" type="submit">{{__('main.track')}}</button>
                                    </form>
                                </div>
                                <div class="col-md-7">
                                    @if ($autorisation != null && !session('error'))
                                        <table class="table">
                                            <thead class="thead-light">
                                                <tr class="text-center">
                                                    <th>{{__('main.Request No')}}</th>
                                                    <th>{{__('main.Publication date')}}</th>
                                                    <th>{{__('main.Status')}}</th>
                                                    @if ($autorisation->status > 1)
                                                        <th>{{__('main.document')}}</th>
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
                                                                <span class="badge badge-danger">{{__('main.new')}}</span>
                                                            @break

                                                            @case('1')
                                                                <span class="badge badge-warning text-white">{{__('main.Inprogress')}}</span>
                                                            @break

                                                            @case('2')
                                                                <span class="badge badge-success text-white">{{__('main.accepted')}}</span>
                                                            @break

                                                            @case('3')
                                                                <span class="badge badge-danger text-white">{{__('main.rejected')}}</span>
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
