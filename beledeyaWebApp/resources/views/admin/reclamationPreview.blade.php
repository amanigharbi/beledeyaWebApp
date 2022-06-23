
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
                         <h4 class="alert-heading">{{__('main.Well done!')}}</h4>
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
                     <h4 class="alert-heading">{{__('main.ops')}}</h4>
                      <p>   {{ session('error') }}</p>
                </div>
            </div>
        </div>
    </div>
        
    @endif
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-9 align-self-center">
                @switch($reclamation->status)
                    @case('0')
                        <span class="badge badge-danger">{{__('main.new')}}</span>
                    @break

                    @case('1')
                        <span class="badge badge-warning text-white">{{__('main.Inprogress')}}</span>
                    @break

                    @case('2')
                        <span class="badge badge-success text-white">{{__('main.Resolved')}}</span>
                    @break
                @endswitch
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">{{__('main.Complaint no')}}:
                    {{ $reclamation->num_rec }} : {{ $reclamation->type }}
                </h3>
            </div>
            @if ($reclamation->status != '2')
                <div class="col-3 align-self-center text-right">
                    <a class="btn btn-success btn-sm mt-3" href="{{ asset('reclamations') }}/{{ $reclamation->id }}"
                        onclick="event.preventDefault(); document.getElementById('update-form').submit();">
                        {{__('main.Mark as resolved')}}
                        <i class="fa fa-check"></i>
                    </a>
                    <form id="update-form" action="{{ route('reclamations.update', $reclamation->id) }}" method="POST"
                        style="display: none;">
                        @csrf @method('PATCH')
                    </form>
                </div>
            @endif
        </div>
        <div class="container-fluid mt-3">
            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">{{__('main.fullname')}}</h6>
                                <div class="d-inline-flex align-items-center">
                                    <h3 class="text-dark mt-3 font-weight-medium">{{ $reclamation->first_name }}
                                        {{ $reclamation->last_name }}</h3>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">{{__('main.ID card')}}</h6>
                                <div class="d-inline-flex align-items-center">
                                    <h3 class="text-dark mt-3 font-weight-medium">{{ $reclamation->cin }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">{{__('main.Attached file')}}</h6>
                                <div class="d-inline-flex align-items-center">
                                    @if ($reclamation->photo)
                                        <p class="text-primary">
                                            <a class="btn btn-primary btn-sm mt-3"
                                                href="{{ asset('storage') }}/{{ $reclamation->photo }}"
                                                target="_blank">Preview
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </p>
                                    @else
                                        <span class="badge badge-danger">{{__('main.Not attached')}}</span>
                                    @endif
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
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">{{__('main.email')}}</h6>
                                <div class="d-inline-flex align-items-center">
                                    <p class="text-dark mt-3 font-weight-medium">{{ $reclamation->email }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">{{__('main.address')}}</h6>
                                <div class="d-inline-flex align-items-center">
                                    <p class="text-dark mt-3 font-weight-medium">{{ $reclamation->adresse }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body collapse show">
                <h4 class="card-title">{{__('main.Descriptions')}}</h4>
                <p class="card-text">{{ $reclamation->sujet }}</p>
            </div>
        </div>
    @endsection
