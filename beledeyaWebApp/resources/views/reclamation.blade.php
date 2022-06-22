@extends('layouts.main') @section('content')
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 align-self-center text-light">
                        <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="text-light">{{__('main.title')}}</h2>
                                    <p class="text-light">
                                        {{__('mainp_municipality')}}
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
    @if (session('success') && session('recId') )
        <script>
            swal({
                title: "{{__('main.Good job!')}}",
                text: "{{ Session::get('success') }}",
                icon: "success",
                button: "download pdf",
                dangerMode: true,

            }).then((value) => {
               
                    open("{{ asset('downPdf') }}/{{ session('recId') }}");
               
                
            });
        </script>
        
    @endif

    @if (session('success') && session('recId') && session('recAr'))
        <script>
            swal({
                title: "{{__('main.Good job!')}}",
                text: "{{ Session::get('success') }}",
                icon: "success",
                button: "download pdf",
                dangerMode: true,

            }).then((value) => {
                open("{{ asset('downPdfAr') }}/{{ session('recId') }}");
            });
        </script>
        
    @endif

    @if (session('error'))
        <script>
            swal({
                title: "OPS!",
                text: "{{ Session::get('error') }}",
                icon: "warning",
                dangerMode: true,
            });
        </script>
    @endif
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://i.ibb.co/TPCPq8s/rec.png" alt="rec" />

                <h3>{{__('main.Welcome to the Complaints area')}}</h3>
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link @if ($rec == null) active @endif" id="home-tab" data-toggle="tab"
                            href="#home" role="tab" aria-controls="home" aria-selected="true">{{__('main.add')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($rec != null) active @endif" id="profile-tab"
                            data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                            aria-selected="true">{{__('main.track')}}</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade @if ($rec == null) show active @endif" id="home"
                        role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">{{__('main.Add a complaint')}}</h3>


                        <form action="{{ asset('addReclamation') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="first_name" placeholder="{{__('main.firstname')}} *"
                                            value="{{ old('first_name') }}" required />
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
                                        <input type="email" class="form-control" name="email" placeholder="{{__('main.email')}} *"
                                            value="{{ old('email') }}" required />
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <button class="btnRegister" type="submit">{{__('main.add')}}</button>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="adresse" placeholder="{{__('main.address')}} "
                                            value="{{ old('adresse') }}" />
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" name="type" value="{{ old('type') }}">
                                            <option class="hidden" selected disabled>{{__('main.Select claim type')}}</option>

                                            <option value="{{__('main.administration')}}">{{__('main.administration')}}</option>
                                            <option value="{{__('main.Anarchic construction')}}">{{__('main.Anarchic construction')}}</option>
                                            <option value="{{__('main.Energy')}}">{{__('main.Energy')}}</option>
                                            <option value="{{__('main.Public lighting')}}">{{__('main.Public lighting')}}</option>
                                            <option value="{{__('main.Green spaces')}}">{{__('main.Green spaces')}}</option>
                                            <option value="{{__('main.Mobility')}}">{{__('main.Mobility')}}</option>
                                            <option value="{{__('main.Illegal occupancy')}}">{{__('main.Illegal occupancy')}}</option>
                                            <option value="{{__('main.Cleanliness')}}">{{__('main.Cleanliness')}}</option>
                                            <option value="{{__('main.Health and Hygiene')}}">{{__('main.Health and Hygiene')}}</option>
                                            <option value="{{__('main.Another type')}}">{{__('main.Another type')}}</option>
                                        </select>
                                        @error('type')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="sujet"
                                            placeholder="{{__('main.Complaint Description')}} *" value="{{ old('sujet') }}"
                                            required />
                                        @error('sujet')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" name="photo"
                                            placeholder="{{__('main.Choose file')}}" value="{{ old('photo') }}" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade @if ($rec != null) show active @endif" id="profile"
                        role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading">{{__('main.Track Complaint')}}</h3>

                        <div class="row register-form">
                            <div class="col-md-5">
                                <form action="{{ asset('checkReclam') }}" method="GET">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="numRec"
                                            placeholder="{{__('main.Complaint number')}} *" value="{{ old('numRec') }}" required />
                                        @error('numRec')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="cin" placeholder="{{__('main.Cin numbe')}} *"
                                            value="{{ old('cin') }}" required />
                                        @error('cin')
                                            {{ $message }}
                                        @enderror
                                    </div>

                                    <button class="btnRegister" type="submit">{{__('main.track')}}</button>
                                </form>
                            </div>
                            <div class="col-md-7">
                                @if ($rec != null && !session('error'))
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr class="">
                                                <th>{{__('main.Complaint no')}}</th>
                                                <th>{{__('main.type')}}</th>
                                                <th>{{__('main.Publication date')}}</th>
                                                <th>{{__('main.Status')}}</th>
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
                                                            <span class="badge badge-danger">{{__('main.new')}}</span>
                                                        @break

                                                        @case('1')
                                                            <span class="badge badge-warning text-white">{{__('main.Inprogress')}}</span>
                                                        @break

                                                        @case('2')
                                                            <span class="badge badge-success text-white">{{__('main.finished')}}</span>
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
