@extends('layouts.master')

@section('title') Home User @endsection

@include('includes.profileAlert')

@section('content')    
    <div class="row mb-2 g-2">
        <div class="col-8">
            <div class="card">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">                    
                    <div id="time"></div>
                    <div id="date" class="mb-4"></div>
                    @if(!$dataHariInis)
                    <form action="{{ route('storeAbsensi') }}" method="post">
                        <div class="row">
                            <div class="col">
                                @csrf
                                <input type="submit" name="masuk" value="Masuk" class="btn btn-outline-primary">
                            </div>
                            <div class="col">
                                <input type="submit" name="absen" value="Absen" class="btn btn-outline-danger">
                            </div>
                        </div>
                    </form>
                    @elseif($dataHariInis)
                    <div class="row">
                        <h5>Sudah Melakukan Absen</h5>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    User Absensi Hari Ini
                    <ul class="list-group list-group-flush">
                        @foreach($dataUserHariInis as $data)
                            <li class="list-group-item"><a href="">{{ $data->user->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Absensi Anda</h5>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody id="table">
                            @foreach($dataUsers as $key => $data)
                                <tr>
                                    <td scope="row">{{ ($dataUsers->currentpage() - 1) * $dataUsers->perpage() + $key + 1 }}</td>
                                    <td>{{ \Carbon\Carbon::parse($data->created_at)->format('M d Y H:i:s') }}</td>
                                    <td>{{ $data->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $dataUsers->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const clock = document.getElementById('time');
        const date = document.getElementById('date');

        setInterval(() => {
            const now = moment();
            const readable = now.format('HH:mm:ss');

            clock.innerHTML = '<h1>' + readable + '</h1>';
        }, 1000);

        function getDate(){
            const now = moment();
            const readable = now.format('MMM DD YYYY');
            
            date.innerHTML = '<h5>' + readable + '</h5>';
        }
        getDate();
    </script>
@endsection