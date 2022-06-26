@extends('layouts.admin')
@section('content')

<div class="row" dir="{{(\App::getLocale()=="ar") ? 'rtl' : 'ltr' }}">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-4">
                    <h4 class="card-title">{{__('main.Users list')}}</h4><br><br>
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissable ml-auto">
                      <a class="panel-close close" data-dismiss="alert">×</a> 
                      <i class="fa fa-check"></i>
                      <strong>{{__('main.success')}} !</strong>. {{ session('success') }}.
                    </div>
            
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissable ml-auto">
                      <a class="panel-close close" data-dismiss="alert">×</a> 
                      <i class="fa fa-warning"></i>
                      <strong>OPS !</strong>. {{ session('error') }}.
                    </div>
                    
                    @endif
                    <div class="ml-auto">
                        <div class="dropdown sub-dropdown ">
                            <button class="btn waves-effect waves-light btn-rounded btn-danger" data-toggle="modal" data-target="#myModal"> 
                                <i class="fa fa-plus"></i>
                            </button>
                           

                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table no-wrap v-middle mb-0" id="editable">
                        <thead>
                            <tr class="border-0">
                                <th class="border-0 font-14 font-weight-medium text-muted {{(\App::getLocale()=="ar") ? 'text-right' : '' }}">{{__('main.USER INFORMATION')}}
                                </th>
                                <th class="border-0 font-14 font-weight-medium text-muted px-2 text-center">{{__('main.role')}}
                                </th>
                                <th class="border-0 font-14 font-weight-medium text-muted px-2 text-center">{{__('main.social')}}
                                </th>
                                <th class="border-0 font-14 font-weight-medium text-muted text-center">{{__('main.emailConfirmed')}}</th>
                                <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                    {{__('main.Created at')}}
                                </th>
                                <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                    {{__('main.action')}}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $u)
                            <tr>
                                <td class="border-top-0 px-2 py-4">
                                    <div class="d-flex no-block align-items-center">
                                        <div class="mr-3"><img
                                                src="admin/assets/images/users/d3.jpg" alt="user"
                                                class="rounded-circle" width="45" height="45" /></div>
                                        <div class="">
                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">
                                                    {{ $u->name }}
                                                </h5>
                                            <span class="text-muted font-14">
                                                {{ $u->email }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="border-top-0 text-muted px-2 py-4 font-14 text-center">
                                    {{ $u->role }}</td>
                                <td class="border-top-0 px-2 py-4 text-center">
                                    <div class="popover-icon">
                                        @if (  $u->social == "Google" )
                                        <a class="btn btn-primary rounded-circle btn-circle font-12"
                                            href="javascript:void(0)"><i class="fab fa-google"></i></a> {{__('main.google')}}
                                          @else
                                        <a class="btn btn-danger rounded-circle btn-circle font-12 "
                                            href="javascript:void(0)"><i class="fa fa-envelope"></i></a> {{__('main.email')}}
                                            @endif
                                    </div>
                                </td>
                                <td class="border-top-0 text-center px-2 py-4">{{ $u->emailConfirmed}}</td>
                                <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">
                                    {{ $u->created_at}}
                                </td>
                                <td class="font-weight-medium text-dark border-top-0 px-2 py-4 text-center">
                                    <li style="display: inline;" >
                                    <i class="fa fa-edit"
                                    data-toggle="modal" data-target="#myModal2" 
                                        onclick="updateBDonModal('{{$u->id}}','{{$u->name}}','{{$u->email}}','{{$u->role}}','{{route('profile_admin.edit',$u->id)}}')"></i></a>
                                    <form class="trash" action="{{ route('profile_admin.destroy', $u->id) }}"
                                        method="POST">@csrf
                                        @method('DELETE')<button type="submit" class="btn btn btn-danger btn-sm mt-2"> <i class="fa fa-trash"></i></button>
                                    </form>
                                   
                                    </li>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
         
            </div>
        </div>
    </div>
</div>
<script>
function updateBDonModal(id, name,email,role, route) {
    document.getElementById("name").value = name;
    document.getElementById("email").value = email;
    document.getElementById("role").value = role;
    document.getElementById("bDonForm").action = route ;
}
</script>

{{-- model add new user --}}
<div class="modal" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">{{__('main.add new user')}}</h1>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
              
                <form role="form" action="{{ route('profile_admin.store') }}"  method="POST" enctype="multipart/form-data">
                    @csrf 
                  
                    <div class="form-group">
                        <label class="control-label">{{__('main.fullname')}}</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="name" value="{{ old('name') }}" required>
                            @error('name')
                            {{ $message }}
                        @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">{{__('main.email')}}</label>
                        <div>
                            <input type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" required>
                            @error('email')
                            {{ $message }}
                        @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">{{__('main.role')}}</label>
                        <div>
                            <select class="form-control" name="role" value="{{ old('role') }}">
                                <option class="hidden" selected disabled>{{__('main.Select role')}}</option>
                                <option value="admin">admin</option>
                                <option value="user">user</option>       
                            </select>
                            @error('role')
                            {{ $message }}
                        @enderror
                        </div>
                    </div>
               
                    <div class="form-group">
                        <div>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('main.close')}}</button>
                            <button type="submit" class="btn btn-success">
                                {{__('main.add')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

            {{-- model  edit user --}}
            <div class="modal" id="myModal2">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title">{{__('main.EditUser')}}</h1>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                        
                            <form form method="post" enctype="multipart/form-data" id="bDonForm" >
                                @csrf  @method('GET')
                              
                                <div class="form-group">
                                    <label class="control-label">{{__('main.fullname')}}</label>
                                    <div>
                                        <input type="text" class="form-control input-lg" name="name" id="name" value="{{$u->name}}">
                                        @error('name')
                                        {{ $message }}
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{__('main.email')}}</label>
                                    <div>
                                        <input type="email" class="form-control input-lg" name="email" id="email" value="{{$u->email}}">
                                        @error('email')
                                        {{ $message }}
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{__('main.role')}}</label>
                                    <div>
                                        <select class="form-control" name="role" id="role" value="{{$u->role}}">
                                            <option class="hidden" selected disabled>{{__('main.Select role')}}</option>
                                            <option value="admin">admin</option>
                                            <option value="user">user</option>       
                                        </select>
                                        @error('role')
                                        {{ $message }}
                                    @enderror
                                    </div>
                                </div>
                           
                                <div class="form-group">
                                    <div>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('main.close')}}</button>
                                        <button type="submit" class="btn btn-success">
                                            {{__('main.edit')}}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <script type="text/javascript">
                $(document).ready(function(){
                   
                  $.ajaxSetup({
                    headers:{
                      'X-CSRF-Token' : $("input[name=_token]").val()
                    }
                  });
                
                  $('#editable').Tabledit({
                    url:'{{route('profile_admin.action') }}',
                    // dataType:"json",
                    
                    columns:{
                      identifier:[0, 'id'],
                      editable:[[1, 'name'], [2, 'email'], [3, 'role', '{"1":"admin", "2":"user"}']]
                    },
                    restoreButton:false,
                    onSuccess:function(data, textStatus, jqXHR)
                    {
                      if(data.action == 'delete')
                      {
                        $('#'+data.id).remove();
                      }
                    }
                  });
                
                });  
                </script>
@endsection