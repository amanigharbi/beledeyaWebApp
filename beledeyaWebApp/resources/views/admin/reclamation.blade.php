@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Reclamations</h4>
                        <h6 class="card-subtitle">these are the list of complaints sent by the inhabitants!
                        </h6>
                        <br>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Full name</th>
                                        <th scope="col">Cin</th>
                                        <th scope="col">Sujet</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recs as $r)
                                        <tr>
                                            <td>{{ $r->first_name }} {{ $r->last_name }}</td>
                                            <td>{{ $r->cin }}</td>
                                            <td>{{ $r->sujet }}</td>
                                            <td>
                                                @switch($r->status)
                                                    @case('0')
                                                        <span class="badge badge-danger">New</span>
                                                    @break

                                                    @case('1')
                                                        <span class="badge badge-warning text-white">In progress</span>
                                                    @break

                                                    @case('2')
                                                        <span class="badge badge-success text-white">Resolved</span>
                                                    @break
                                                @endswitch
                                            <td>
                                                <a href="{{ asset('reclamations') }}/{{ $r->id }}">
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
