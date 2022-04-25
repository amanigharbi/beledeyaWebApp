@extends('layouts.admin')

@section('content')
<div class="col-sm-12 col-md-6 col-lg-12">
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Add new document</h4>
        @if (session('success'))
        {{ session('success') }}
    @endif
    @if (session('error'))
        {{ session('error') }}
    @endif
        <form class="mt-5" action="{{ route('document.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="name" class="form-control" id="nametext" name="name"
                    placeholder="Name document" value="{{ old('name') }}" required></div>
                    <div class="form-group">
                        @error('name')
                                        {{ $message }}
                                    @enderror
                    <input type="file" class=" form-control form-control-file" name="file" value="{{ old('file') }}" required>
                    @error('file')
                    {{ $message }}
                @enderror
                </div>
            <div class="text-right">
                <button class="btn btn-rounded btn-danger" type="submit">Envoyer</button>
            </div>
        </form>
    </div></div>
</div>
<div class="col-sm-12 col-md-6 col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List of documents</h4>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Date publication</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doc as $d)
                            <tr>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->date }}</td>
                                <td>
                                    @if ($d->file)
                                        <p class="text-primary d-inline p-2">
                                            <a class="btn btn-primary btn-sm mt-3"
                                                href="{{ asset('storage') }}/{{ $d->file }}"
                                                target="_blank">Preview
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </p>
                                    @else
                                        <span class="badge badge-danger">Not attached</span>
                                    @endif
                             
                              
                                    <p class="text-primary d-inline p-2">
                                        <a class="btn btn-primary btn-sm mt-3"
                                            href="{{ asset('delFile')}}/{{ $d->id }}"
                                            target="_blank">Delete
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
