@extends('layouts.admin')

@section('content')
<div class="col-sm-12 col-md-6 col-lg-12" dir="{{(\App::getLocale()=="ar") ? 'rtl' : 'ltr' }}">
<div class="card">
    <div class="card-body">
        <h4 class="card-title {{(\App::getLocale()=="ar") ? 'text-right' : '' }}">{{__('main.Add new document')}}</h4>
        @if (session('success'))
        {{ session('success') }}
    @endif
    @if (session('error'))
        {{ session('error') }}
    @endif
        <form class="mt-5" action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="name" class="form-control" id="nametext" name="name"
                    placeholder="{{__('main.document name')}}" value="{{ old('name') }}" required></div>
                    <div class="form-group">
                        @error('name')
                                        {{ $message }}
                                    @enderror
                    <input type="file" class=" form-control form-control-file" name="file" value="{{ old('file') }}" required>
                    @error('file')
                    {{ $message }}
                @enderror
                </div>
            <div class="{{(\App::getLocale()=="ar") ? 'text-left' : '' }}">
                <button class="btn btn-rounded btn-danger" type="submit">{{__('main.Send')}}</button>
            </div>
        </form>
    </div></div>
</div>
<div class="col-sm-12 col-md-6 col-lg-12" dir="{{(\App::getLocale()=="ar") ? 'rtl' : 'ltr' }}">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title {{(\App::getLocale()=="ar") ? 'text-right' : '' }}">{{__('main.List of documents')}}</h4>

            <div class="table-responsive {{(\App::getLocale()=="ar") ? 'text-right' : '' }}">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{__('main.document name')}}</th>
                            <th scope="col">{{__('main.Publication date')}}</th>
                            <th scope="col">{{__('main.action')}}</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doc as $d)
                            <tr>
                                <td>{{ $d->name }}</td>

                                <td>{{ $d->date }}</td>
                             
                                <td>
                                    <div class="d-flex align-items-start">
                                    @if ($d->file)
                                        <p class="text-primary">
                                            <a class="btn btn-primary btn-sm mt-3"
                                                href="{{ asset('storage') }}/{{ $d->file }}"
                                                target="_blank" role="button">{{__('main.preview')}}
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </p>
                                    @else
                                        <span class="badge badge-danger">{{__('main.Not attached')}}</span>
                                    @endif                          
                              
                                    <p class="text-primary ">
                                        <form class="trash" action="{{ route('document.destroy', $d->id) }}"
                                            method="POST">@csrf
                                            @method('DELETE')<button type="submit" class="btn btn btn-danger btn-sm mt-3">{{__('main.Delete')}} <i class="fa fa-trash"></i></button>
                                        </form>
                                    </p>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
