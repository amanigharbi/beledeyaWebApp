<style>
    .table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px 0;
        border-radius: 1px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
    }

    .table-title {
        padding-bottom: 15px;
        background: linear-gradient(40deg, #b41232, #ff056d) !important;
        color: #fff;
        padding: 16px 30px;
        margin: -20px -25px 10px;
        border-radius: 1px 1px 0 0;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
    }

    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }


    table.table tr th,
    table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;

    }

    table.table tr th:first-child {
        width: 100px;
    }

    table.table tr th:last-child {
        width: 150px;
    }

    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }

    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }

    .modal .modal-footer {
        background: #ecf0f1;
        border-radius: 0 0 1px 1px;
    }

    .modal .modal-title {
        display: inline-block;
    }

    .modal .form-control {
        border-radius: 1px;
        box-shadow: none;
        border-color: #dddddd;
    }

</style>
@extends('layouts.main')

@section('content')
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
    @if (session('success') && session('resId'))
        <script>
            swal({
                title: "{{__('main.Good job!')}}",
                text: "{{ Session::get('success') }}",
                icon: "success",
                button: "download pdf",
                dangerMode: true,

            }).then((value) => {
                open("{{ asset('downPdfRes') }}/{{ session('resId') }}");
            });
        </script>
    @endif
    @if (session('success') && session('resId') && session('resAr'))
    <script>
        swal({
            title: "{{__('main.Good job!')}}",
            text: "{{ Session::get('success') }}",
            icon: "success",
            button: "download pdf",
            dangerMode: true,

        }).then((value) => {
            open("{{ asset('downPdfResAr') }}/{{ session('resId') }}");
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
                <img src="https://i.ibb.co/bb1YsqB/res-Public-removebg-preview.png" alt="res-Public-removebg-preview" />

                <h3>{{__('main.Welcome to the public network connection area')}}</h3>
                <button type="button" data-toggle="modal" data-target="#myModal">
                    {{__('main.Track requests')}}
                </button>
            </div>
            <div class="col-md-9 register-right">


                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade  show active  " id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">{{__('main.Add a request')}}</h3>

                        <form action="{{ asset('addDemande') }}" method="POST" enctype="multipart/form-data">
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
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="adresse" placeholder="{{__('main.address')}} "
                                            value="{{ old('adresse') }}" />
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" name="type" value="{{ old('type') }}">
                                            <option class="hidden" selected disabled>{{__('main.Select connection type')}}</option>
                                            <option value="Sonede">{{__('main.Sonede')}}</option>
                                            <option value="Steg ">{{__('main.Steg')}} </option>

                                        </select>
                                        @error('type')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="description"
                                            placeholder="{{__('main.Connection description')}} *" value="{{ old('description') }}"
                                            required />
                                        @error('description')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <button class="btnRegister" style="float: left;!important" type="submit">{{__('main.add')}}</button>
                                </div>

                            </div>
                        </form>
                    </div>


                </div>

            </div>

        </div>
    </div>


    </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal" >
        <div class="modal-dialog modal-lg " >
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header table-title">
                    <h2>{{__('main.Track requests')}}></h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body " style="width: auto">
                    
                    <form action="{{ asset('checkDemande') }}" method="GET" class="mx-auto" style="width: 80%">
                        @csrf
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">{{__('main.Connection request number')}}:</label>
                          <input type="text" class="form-control" name="num_branch"value="{{ old('num_branch') }}" required />
                          @error('num_branch')
                              {{ $message }}
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">{{__('main.Cin number')}}</label>
                            <input type="text" class="form-control" name="cin"value="{{ old('cin') }}" required />
                            @error('cin')
                                {{ $message }}
                            @enderror
                          </div>
                          <button class="button-3" type="submit">{{__('main.track')}}</button>
                      </form>
                      <br><br>
                      @if ($res != null && !session('error'))

                    <table class="table table-striped table-hover" >
                        <thead class="text-center">
                            <tr>
                                <th>{{__('main.Request No')}} </th>
                                <th> {{__('main.type')}} </th>
                                <th> {{__('main.Publication date')}}</th>
                                <th>{{__('main.Status')}}</th>
                                <th>{{__('main.document')}}</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                          {{--   @foreach ($res as $r) --}}
                                <tr>
                                    <td>{{ $res->num_branch }}</td>
                                    <td>{{ $res->type }}</td>
                                    <td>
                                        {{ $res->created_at }}
                                    </td>
                                    <td>
                                        @switch($res->status)
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
                                    @if ($res->status ==2) 
                                                        <td><button type="submit" class="" onclick="window.location.href='{{ asset('downPdfDecisionRes') }}/{{$res->id}}';"><i
                                                            class="fas fa-eye"></i></button>
                                                        </td>
                                                     
                                                     @else
                                                     <td>
                                                     <span class="badge badge-light">{{__('main.no documents')}}</span>
                                                     </td>
                                                 @endif
                                </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                    @endif
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('main.close')}}</button>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
