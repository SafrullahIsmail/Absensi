@extends('layouts.master')

@section('title') Laporan @endsection

@section('content')
    <div class="row mb-2 g-2">
        <div class="col">
            <div class="card">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Laporan Absensi</h5>
                    <div id="table_data">
                        @include('includes.tabledata')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    // const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    // const table = document.getElementById('table');
    // const pagi = document.querySelector('.pagination a');

    // pagi.addEventListener('click', function(event){
    //     event.preventDefault();
    //     let page = this.getAttribute('href').split('page=')[1];
    //     getDataUser(page)
    //         .then(data => table.innerHTML = data)
    //         .catch(err => console.log('rejected: ', err.message));
    // });
    // const getDataUser = async (hal) => {
    //     const response = await fetch('/laporan/pagination?'+hal);

    //     if(response.status !== 200){
    //         throw new Error('Tidak bisa fetch data');
    //     }

    //     const data = await response.text();
        
    //     return data;
    // }
    $(document).ready(function(){
        $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            fetchData(page);
        });

        function fetchData(page){
            $.ajax({
                url:"/laporan/pagination?page="+page,
                success:function(data){
                    $('#table_data').html(data);
                }
            })
        }
    });


</script>
@endsection