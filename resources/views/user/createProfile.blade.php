@extends('layouts.master')

@section('title') Profile @endsection

@section('content')
    <div class="row mb-2 align-items-center justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-body">   
                    @include('includes.error')
                    <form action="{{ route('storeProfile') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-1">
                            <img src="{{ asset('images/noImage.jpg') }}" alt="" width="150" height="150" class="mb-1">                        
                            <input class="form-control" type="file" name="img">
                        </div>
                        <div class="mb-1">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="mb-1">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="mb-1">
                            <label for="divisi" class="form-label">Divisi</label>
                            <input type="divisi" name="divisi" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
