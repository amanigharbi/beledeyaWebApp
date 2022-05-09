@extends('layouts.admin')

@section('content')
    @if (session('success'))
        <br>
        <div class="alert alert-success w-50 m-auto text-center">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <br>
        <div class="alert alert-danger w-50 m-auto text-center">
            {{ session('error') }}
        </div>
    @endif
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-9 align-self-center">
                @switch($reclamation->status)
                    @case('0')
                        <span class="badge badge-danger">New</span>
                    @break

                    @case('1')
                        <span class="badge badge-warning text-white">Seen</span>
                    @break

                    @case('2')
                        <span class="badge badge-success text-white">Resolved</span>
                    @break
                @endswitch
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Reclamation N°:
                    {{ $reclamation->num_rec }} : {{ $reclamation->type }}
                </h3>
            </div>
            @if ($reclamation->status != '2')
                <div class="col-3 align-self-center text-right">
                    <a class="btn btn-success btn-sm mt-3" href="{{ asset('reclamations') }}/{{ $reclamation->id }}"
                        onclick="event.preventDefault(); document.getElementById('update-form').submit();">
                        Mark as resolved
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
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Full name</h6>
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
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Cin</h6>
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
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Attached file</h6>
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
                                        <span class="badge badge-danger">Not attached</span>
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
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Email</h6>
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
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Address</h6>
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
                <h4 class="card-title">Descriptions</h4>
                <p class="card-text">{{ $reclamation->sujet }}</p>
            </div>
        </div>
    @endsection
