@extends('layouts.master')

@section('title') Covid-19 @endsection

@section('content')
    <div class="row mb-2 g-2">
        <div class="col">
            <div class="card">
                <div class="card-body d-flex flex-column">
                    <h1>Jumlah Kasus di Indonesia Saat Ini</h1>
                    <div class="row mt-4">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h2>{{ number_format($data->confirmed->value, 0, ',', '.') }}</h2>
                                    <h5>Terkonfirmasi</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h2>{{ number_format($data->recovered->value, 0, ',', '.') }}</h2>
                                    <h5>Sembuh</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h2>{{ number_format($data->deaths->value, 0, ',', '.') }}</h2>
                                    <h5>Meninggal</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>        
        // const kasus = document.getElementById('kasus');
        // const positif = document.getElementById('positif');
        // const meninggal = document.getElementById('meninggal');
        // const getApi = (resource, e) => {
        //     return new Promise((resolve, reject) => {
        //         const req = new XMLHttpRequest();
        //         req.addEventListener('readystatechange', () => {
        //             if(req.readyState === 4 && req.status === 200){
        //                 const data = JSON.parse(req.responseText);
        //                 resolve(data);
        //             }else if(req.readyState === 4){
        //                 reject('error getting resource');
        //             }
        //         });

        //         req.open('GET', resource);
        //         req.send();
        //     });
        // };

        // getApi('https://covid19.mathdro.id/api/countries/IDN')
        //     .then(data => {
        //         kasus.innerHTML = `<h2>${new Intl.NumberFormat('de-DE').format(data.confirmed['value'])}</h2>`;
        //         positif.innerHTML = `<h2>${new Intl.NumberFormat('de-DE').format(data.recovered['value'])}</h2>`;
        //         meninggal.innerHTML = `<h2>${new Intl.NumberFormat('de-DE').format(data.deaths['value'])}</h2>`;
        //         console.log(data);
        //     })
        //     .catch(err => console.log(err));
    </script>
@endsection