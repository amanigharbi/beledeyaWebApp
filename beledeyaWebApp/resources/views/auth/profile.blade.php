<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/profile_css.css') }}">
@extends('layouts.main')
@section('content')

<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; ">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-8"></span>
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      
      <div class="col-lg-7 col-md-10">
        <h1 class="display-2 text-white">{{__('main.Hello')}} {{$userProfile->name}}</h1>
        <p class="text-white mt-0 mb-5">{{__('main.p_profile')}}</p>
        <a href="#editProfile" class="btn btn-info">{{__('main.editProfile')}}</a>
      </div>
      
    </div>
    
  </div>
  
</div>
<!-- Page content -->
<div class="container-fluid mt--7">
  <div class="row">
    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
      <div class="card card-profile shadow">
        <div class="row justify-content-center">
          <div class="col-lg-3 order-lg-2">
            <div class="card-profile-image">
              <a href="#">
                <img src="{{ asset('assets/images/client-image.jpg') }}" class="rounded-circle">
              </a>
            </div>
          </div>
        </div>
        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
          {{-- <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
            <a href="#" class="btn btn-sm btn-default float-right">Message</a>
          </div> --}}
        </div>
        <div class="card-body pt-0 pt-md-4">
          <div class="row">
            <div class="col">
              <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                {{-- <div>
                  <span class="heading">Email confirmé</span>
                  <span class="description">{{$userProfile->emailConfirmed}}</span>
                </div> --}}
                <div>
                  <span class="heading">{{__('main.role')}}</span>
                  <span class="description">{{$userProfile->role}}</span>
                </div>
                <div>
                  <span class="heading">{{__('main.social')}}</span>
                  <span class="description">{{$userProfile->social}}</span>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center">
            <h3>
              {{$userProfile->name}}
              {{-- <span class="font-weight-light">, 27</span> --}}
            </h3>
            <div class="h5 font-weight-300">
              <i class="ni location_pin mr-2"></i>{{$userProfile->email}}
            </div>
            <div class="h5 mt-4">
              <i class="ni business_briefcase-24 mr-2"></i>{{__('main.Created at')}} - <span class="font-weight-light">{{$userProfile->created_at}}</span>
           <br> 
              <i class="ni business_briefcase-24 mr-2"></i>{{__('main.Updated at')}} - <span class="font-weight-light">{{$userProfile->updated_at}}</span>
            </div>
           
            <hr class="my-4">
<p> {{__('main.Account on commune of Menzel Abderahmane')}}</p>          
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-8 order-xl-1" id="editProfile">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">{{__('main.Account editing')}}</h3>
            </div>
            
          </div>
        </div>
        <div class="card-body">
          <form action="{{ route('profile.update', $userProfile->id) }}" method="POST">
            @csrf @method('PATCH')
            <h6 class="heading-small text-muted_2 mb-4">{{__('main.USER INFORMATION')}}</h6>
          
            @if (session('success'))
            <div class="alert alert-success alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">×</a> 
              <i class="fa fa-check"></i>
              <strong>{{__('main.Change successfully')}} !</strong>. {{ session('success') }}.
            </div>
    
            @endif
            @if (session('error'))
            <div class="alert alert-danger alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">×</a> 
              <i class="fa fa-warning"></i>
              <strong>OPS !</strong>. {{ session('error') }}.
            </div>
            
            @endif
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-username">{{__('main.fullname')}}</label>
                    <input type="text" id="input-username" name="name" class="form-control form-control-alternative"  value="{{$userProfile->name}}">
                
                  </div>
                      @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">{{__('main.email')}}</label>
                    <input type="email" id="input-email" name="email" class="form-control form-control-alternative" placeholder="email" value="{{$userProfile->email}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-first-name">{{__('main.password')}}</label>
                    <input type="password" name="mdp_1" class="form-control form-control-alternative" placeholder="{{__('main.password')}}" >
                    @error('mdp_1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-last-name">{{__('main.Confirm password')}}</label>
                    <input type="password" name="mdp_2" class="form-control form-control-alternative" placeholder="{{__('main.Confirm password')}}" >
                  @error('mdp_2')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                  </div>
                </div>
              </div>
            </div>
            <hr class="my-4">
            <div class="col-12 text-right">
              <button type="submit" class="btn btn-sm btn-primary" >{{__('main.edit')}}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection