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
         
          
                <table class="text-center">
                    <tr>
                        <td>
            @if (($permisConstruction->status != '2') && ($permisConstruction->status != '3'))
                <div class="col-8 align-self-center ">
                    <a class="btn waves-effect waves-light btn-rounded btn-success" href="{{ asset('PermisConstructions') }}/{{ $permisConstruction->id }}"
                        onclick="event.preventDefault(); document.getElementById('update-form').submit();">
                        
                        <i class="fa fa-check">Accept</i>
                    </a>
                    <form id="update-form" action="{{ route('PermisConstructions.update', $permisConstruction->id) }}" method="POST"
                        style="display: none;">
                        @csrf @method('PATCH')
                    </form>
                </div>
            @endif
                        </td>
            {{-- @if (($permisConstruction->status != '3') && ($permisConstruction->status != '2'))
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
            @endif --}}
            <td>
            @if (($permisConstruction->status != '3') && ($permisConstruction->status != '2'))
            <button class="btn waves-effect waves-light btn-rounded btn-danger" data-toggle="modal" data-target="#myModal"> 
                Reject
                <i class="fa fa-ban"></i>
            </button>
            <!-- The Modal -->

@endif
            </td>
                    </tr>
                </table>
  
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
            

  <div class="modal" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Reason of reject</h1>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
              
                <form role="form" action="{{ route('PermisConstructions.edit', $permisConstruction->id) }}" method="POST">
                    @csrf @method('GET')
                  
                    <div class="form-group">
                        <label class="control-label">Reason</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="raison" value="" required>
                            @error('raison')
                            {{ $message }}
                        @enderror
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <div>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->       
            @if ($permisConstruction->status == '3')
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Reasson of Reject</h6>
                        <div class="d-inline-flex align-items-center">
                            <p class="text-dark mt-3 font-weight-medium">{{ $permisConstruction->response }}</p>
                        </div>

                    </div>
                </div>
            </div>
        @endif
        </div>
        
    @endsection
