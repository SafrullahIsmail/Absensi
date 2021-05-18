@extends('layouts.master')

@section('title') Profile @endsection

@section('content')    
    <div class="row mb-2 d-flex flex-row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex flex-column justify-content-center align-items-center">
                        <div class="col d-flex justify-content-center align-items-center">
                            <img src="{{ $data ? asset($data->img) : asset('images/noImage.jpg') }}" alt="imgProfile" class="mb-2" width="200" height="200">                            
                        </div>
                        <div class="col d-flex justify-content-center align-items-center">
                            <div class="row d-flex justify-content-center align-items-center">
                                <h5 class="p-0 mb-3">Profile</h5>
                                <table>
                                    <tr>
                                        <th>Name</th>
                                        <td>:</td>
                                        <td>{{ Auth::user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>:</td>
                                        <td>{{ Auth::user()->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Devisi</th>
                                        <td>:</td>
                                        <td>{{ $data ? $data->divisi : ''}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @if(!$data)
                            <li class="list-group-item"><a href="{{ route('createProfile') }}">Isi Data Diri</a></li>
                        @else
                            <li class="list-group-item"><a href="#">Sunting Profile</a></li>
                        @endif
                        <li class="list-group-item"><a href="">Ganti Password</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection