<style>
    body {
    margin: 0;
    padding-top: 40px;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
}
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
    color: black;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}

</style>
@extends('layouts.admin')

@section('content')
<div class="container {{(\App::getLocale()=="ar") ? 'text-right' : '' }}" dir="{{(\App::getLocale()=="ar") ? 'rtl' : 'ltr' }}">
    <div class="row gutters">
    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
    <div class="card h-100">
        <div class="card-body">
            <div class="account-settings">
                <div class="user-profile">
                    <div class="user-avatar">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                    </div>
                    <h5 class="user-name">{{$userProfile->name}}</h5>
                    <h6 class="user-email">{{$userProfile->email}}</h6>
                </div>
                <div class="about">
                    <h5>{{__('main.about')}}</h5>
                    <p>{{__('main.Im')}} {{$userProfile->name}}. {{__('main.The administrator of municipality of Menzel Abdelrahmane')}}</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
    <div class="card h-100">
        <div class="card-body">
            <form action="{{ route('profile_admin.update', $userProfile->id) }}" method="POST">
                @csrf @method('PATCH')
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mb-2 text-primary">{{__('main.Personal Details')}}</h6>
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
                      <strong>{{__('main.ops')}}</strong>. {{ session('error') }}.
                    </div>
                    
                    @endif
                </div>
                
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="fullName">{{__('main.fullname')}}</label>
                        <input type="text" class="form-control" name="name" value="{{$userProfile->name}}">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="eMail">{{__('main.email')}}</label>
                        <input type="email" class="form-control" name="email" value="{{$userProfile->email}}">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="password">{{__('main.password')}}</label>
                        <input type="password" class="form-control" name="mdp_1" placeholder="{{__('main.password')}}">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="password">{{__('main.Confirm password')}}</label>
                        <input type="password" class="form-control" name="mdp_2"  placeholder="{{__('main.Confirm password')}}">
                    </div>
                </div>
            </div>
         
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="{{(\App::getLocale()=="ar") ? 'text-left' : 'text-right' }}">
                        <button  type="submit" name="submit" class="btn btn-primary ">{{__('main.edit')}}</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection