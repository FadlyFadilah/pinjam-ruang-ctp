@extends('layouts.default')
@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('vendor/technext/vacation-rental/images/bg_1.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ route('home') }}">Beranda <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Ruangan <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread">Daftar Ruangan</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light ftco-no-pt ftco-no-pb">
        <div class="container-fluid px-md-0">
            <div class="row no-gutters">
                @foreach ($ruangans as $item)
                    <div class="col-5 mx-auto text-center">
                        <div class="card room-wrap p-2 m-4">
                            <a href="#" class="img"
                                style="background-image: url({{ asset($barang->gambar->getUrl('thumb')) }});"></a>
                            <div class="half left-arrow d-flex align-items-center">
                                <div class="text p-4 p-xl-5 text-center">
                                    <p class="star mb-0"><span class="fa fa-star"></span><span
                                            class="fa fa-star"></span><span class="fa fa-star"></span><span
                                            class="fa fa-star"></span><span class="fa fa-star"></span></p>
                                    <h3 class="mb-3"><a href="rooms.html">{{ $item->nama_ruangan }}</a></h3>
                                    <ul class="list-accomodation">
                                        <li><span>Maks:</span> {{ $item->kapasitas }} Orang</li>
                                        <li><span>Lokasi:</span> {{ $item->lokasi }}</li>
                                        <li><span>Deskripsi:</span> {{ $item->deskripsi }}</li>
                                        <li><span>Status:</span> {{ $item->status }}
                                        </li>
                                        <li>{!! implode('<br>', $item->status) !!}</li>
                                    </ul>
                                    <p class="pt-1"><a href="#" id="buttonBorrowRoomModal"
                                            class="btn-custom px-3 py-2" data-toggle="modal" data-target="#borrowRoomModal"
                                            data-room-id="{{ $item->id }}" data-room-name="{{ $item->name }}">Details
                                            <span class="icon-long-arrow-right"></span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
