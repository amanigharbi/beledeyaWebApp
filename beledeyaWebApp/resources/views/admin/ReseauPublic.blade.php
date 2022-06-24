@extends('layouts.admin')

@section('content')
    <div class="container-fluid" dir="{{(\App::getLocale()=="ar") ? 'rtl' : 'ltr' }}">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title {{(\App::getLocale()=="ar") ? 'text-right' : '' }}">{{__('main.Demande of public grid')}}</h4>
                        <h6 class="card-subtitle {{(\App::getLocale()=="ar") ? 'text-right' : '' }}">{{__('main.these are the list of demande of public grid sent by the inhabitants!')}}
                        </h6>
                        <br>
                        <div class="table-responsive {{(\App::getLocale()=="ar") ? 'text-right' : '' }}">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">{{__('main.Document number')}}</th>
                                        <th scope="col">{{__('main.fullname')}}</th>
                                        <th scope="col">{{__('main.ID card')}}</th>
                                        <th scope="col">{{__('main.Descriptions')}}</th>
                                        <th scope="col">{{__('main.Status')}}</th>
                                        <th scope="col">{{__('main.action')}}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($res as $r)
                                        <tr>
                                            <td>{{ $r->num_branch }}</td>
                                            <td>{{ $r->first_name }} {{ $r->last_name }}</td>
                                            <td>{{ $r->cin }}</td>
                                            <td>{{ $r->description }}</td>
                                            <td>
                                                @switch($r->status)
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
                                            <td>
                                                <a href="{{ asset('ReseauPublic') }}/{{ $r->id }}">
                                                    <button class="btn btn-success btn-sm"><i
                                                            class="fas fa-eye"></i></button>
                                                </a>
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
    </div>
@endsection
