@extends('layouts.default')
@section('content')
    <section class="hero-wrap hero-wrap-2"
        style="background-image: url('{{ asset('vendor/technext/vacation-rental/images/bg_1.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ route('home') }}">Beranda <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Barang <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread" style="font-family: 'Plus Jakarta Sans'">Daftar Barang</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light ftco-no-pt ftco-no-pb">
        <div class="container-fluid px-md-0">
            <div class="row no-gutters">
                @foreach ($barangs as $item)
                    <div class="col-md-5 p-2 mx-auto mb-2 mt-4 text-center">
                        <div class="card room-wrap" style="height: 700px;">
                            @if ($item->gambar)
                                <a href="#" class="img"
                                    style="background-image: url({{ $item->gambar->getUrl() }}); background-size: cover; background-position: center; height: 200px;"></a>
                            @endif

                            <div class="half left-arrow d-flex align-items-center">
                                <div class="text p-4 p-xl-5 text-center">
                                    <p class="star mb-0"><span class="fa fa-star"></span><span
                                            class="fa fa-star"></span><span class="fa fa-star"></span><span
                                            class="fa fa-star"></span><span class="fa fa-star"></span></p>
                                    <h3 class="mb-3"><a href="rooms.html">{{ $item->nama_barang }}</a></h3>
                                    <ul class="list-accomodation">
                                        <li><span>Maks:</span> {{ $item->kapasitas ?? 'Semua' }} Orang</li>
                                        <li><span>Lokasi:</span> {{ $item->lokasi }}</li>
                                        <li><span>Deskripsi:</span> {{ $item->deskripsi }}</li>
                                        <li><span>Status:</span> {{ $item->status }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
