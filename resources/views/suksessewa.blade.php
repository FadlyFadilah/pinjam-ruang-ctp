@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card bg-success" >
                <div class="card-header">
                    Laporan
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1 class="text-center" style="font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 600;font-size: 50px;">
                        Permohonan Penyewaan Anda <br>
                        Telah Berhasil
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection