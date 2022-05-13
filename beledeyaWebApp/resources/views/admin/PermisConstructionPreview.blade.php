@extends('layouts.admin')

@section('content')
@if (session('success'))
        
        
<div classs="container p-2">
    <div class="row no-gutters">
        <div class="col-lg-3 col-md-12 ml-auto">
            <div class="alert alert-success fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="True">&times;</span>
                  </button>
                 <h4 class="alert-heading">Well done!</h4>
                  <p>   {{ session('success') }}</p>
            </div>
        </div>
    </div>
</div>
@endif
@if (session('error'))
<div classs="container p-2">
<div class="row no-gutters">
    <div class="col-lg-3 col-md-12 ml-auto">
        <div class="alert alert-danger fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="True">&times;</span>
              </button>
             <h4 class="alert-heading">OPS!</h4>
              <p>   {{ session('error') }}</p>
        </div>
    </div>
</div>
</div>

@endif
  
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-9 align-self-center">
                @switch($permisConstruction->status)
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
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Demande d'autorisation de batir N°
                    {{ $permisConstruction->num_autor }} 
                </h3>
            </div>
            <div class="text-right d-flex align-items-start">
            @if (($permisConstruction->status != '2') && ($permisConstruction->status != '3'))
                <div class="col-8 align-self-center ">
                    <a class="btn btn-success btn-sm mt-3" href="{{ asset('PermisConstructions') }}/{{ $permisConstruction->id }}"
                        onclick="event.preventDefault(); document.getElementById('update-form').submit();">
                        Accept
                        <i class="fa fa-check"></i>
                    </a>
                    <form id="update-form" action="{{ route('PermisConstructions.update', $permisConstruction->id) }}" method="POST"
                        style="display: none;">
                        @csrf @method('PATCH')
                    </form>
                </div>
            @endif
            @if (($permisConstruction->status != '3') && ($permisConstruction->status != '2'))
                <div class="col-8 align-self-center ">
                    <a class="btn btn-danger btn-sm mt-3" href="{{ asset('PermisConstructions') }}/{{ $permisConstruction->id }}"
                        onclick="event.preventDefault(); document.getElementById('update-form2').submit();">
                        Reject
                        <i class="fa fa-ban"></i>
                    </a>
                    <form id="update-form2" action="{{ route('PermisConstructions.edit', $permisConstruction->id) }}" method="POST"
                        style="display: none;">
                        @csrf @method('GET')
                    </form>
                </div>
            @endif
        </div></div>
        <div class="container-fluid mt-3">
            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Full name</h6>
                                <div class="d-inline-flex align-items-center">
                                    <h3 class="text-dark mt-3 font-weight-medium">{{ $permisConstruction->first_name }}
                                        {{ $permisConstruction->last_name }}</h3>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Cin</h6>
                                <div class="d-inline-flex align-items-center">
                                    <h3 class="text-dark mt-3 font-weight-medium">{{ $permisConstruction->cin }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Email</h6>
                                <div class="d-inline-flex align-items-center">
                                    <p class="text-dark mt-3 font-weight-medium">{{ $permisConstruction->email }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Address</h6>
                                <div class="d-inline-flex align-items-center">
                                    <p class="text-dark mt-3 font-weight-medium">{{ $permisConstruction->adresse }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Surface</h6>
                                <div class="d-inline-flex align-items-center">
                                    <p class="text-dark mt-3 font-weight-medium">{{ $permisConstruction->surface }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Propriete?</h6>
                                <div class="d-inline-flex align-items-center">
                                    <p class="text-dark mt-3 font-weight-medium">{{ $permisConstruction->prop }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    @endsection
