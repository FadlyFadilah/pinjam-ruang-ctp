@extends('layouts.default')
@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('vendor/technext/vacation-rental/images/bg_1.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ route('home') }}">Beranda <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Pendaftaran <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread" style="font-family: 'Plus Jakarta Sans'">Pendaftaran</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light ftco-no-pt ftco-no-pb">
        <div class="container-fluid px-md-0">
            <div class="row no-gutters">
                <div class="col-5 mx-auto text-center">
                    <div class="card room-wrap p-2 m-4">
                        <div class="half left-arrow d-flex align-items-center">
                            <div class="text p-4 p-xl-5 text-center">
                                <p class="star mb-0"><span class="fa fa-star"></span><span class="fa fa-star"></span><span
                                        class="fa fa-star"></span><span class="fa fa-star"></span><span
                                        class="fa fa-star"></span></p>
                                <h3 class="mb-3"><a href="rooms.html">Pendaftaran Penelitian</a></h3>
                                <ul class="list-accomodation">
                                    <li><span>Lokasi:</span>Cimahi Technopark</li>
                                    <li><span>Deskripsi:</span>Deskripsi</li>
                                    <li><span>Status:</span> Dibuka</li>
                                </ul>
                                <p class="pt-1">
                                    <a href="#" id="buttonBorrowRoomModal" class="btn-custom px-3 py-2"
                                        >Details
                                        <span class="icon-long-arrow-right"></span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5 mx-auto text-center">
                    <div class="card room-wrap p-2 m-4">
                        <div class="half left-arrow d-flex align-items-center">
                            <div class="text p-4 p-xl-5 text-center">
                                <p class="star mb-0"><span class="fa fa-star"></span><span class="fa fa-star"></span><span
                                        class="fa fa-star"></span><span class="fa fa-star"></span><span
                                        class="fa fa-star"></span></p>
                                <h3 class="mb-3"><a href="rooms.html">Pendaftaran Magang</a></h3>
                                <ul class="list-accomodation">
                                    <li><span>Lokasi:</span>Cimahi Technopark</li>
                                    <li><span>Deskripsi:</span>Deskripsi</li>
                                    <li><span>Status:</span> Dibuka</li>
                                </ul>
                                <p class="pt-1">
                                    <a href="#" id="buttonBorrowRoomModal" class="btn-custom px-3 py-2"
                                        >Details
                                        <span class="icon-long-arrow-right"></span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5 mx-auto text-center">
                    <div class="card room-wrap p-2 m-4">
                        <div class="half left-arrow d-flex align-items-center">
                            <div class="text p-4 p-xl-5 text-center">
                                <p class="star mb-0"><span class="fa fa-star"></span><span class="fa fa-star"></span><span
                                        class="fa fa-star"></span><span class="fa fa-star"></span><span
                                        class="fa fa-star"></span></p>
                                <h3 class="mb-3"><a href="rooms.html">Pendaftaran PKL</a></h3>
                                <ul class="list-accomodation">
                                    <li><span>Lokasi:</span>Cimahi Technopark</li>
                                    <li><span>Deskripsi:</span>Deskripsi</li>
                                    <li><span>Status:</span> Dibuka</li>
                                </ul>
                                <p class="pt-1">
                                    <a href="#" id="buttonBorrowRoomModal" class="btn-custom px-3 py-2"
                                        >Details
                                        <span class="icon-long-arrow-right"></span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5 mx-auto text-center">
                    <div class="card room-wrap p-2 m-4">
                        <div class="half left-arrow d-flex align-items-center">
                            <div class="text p-4 p-xl-5 text-center">
                                <p class="star mb-0"><span class="fa fa-star"></span><span class="fa fa-star"></span><span
                                        class="fa fa-star"></span><span class="fa fa-star"></span><span
                                        class="fa fa-star"></span></p>
                                <h3 class="mb-3"><a href="#">Pendaftaran Cimahi Makerspace</a></h3>
                                <ul class="list-accomodation">
                                    <li><span>Lokasi:</span>Cimahi Technopark</li>
                                    <li><span>Deskripsi:</span>Deskripsi</li>
                                    <li><span>Status:</span> Dibuka</li>
                                </ul>
                                <p class="pt-1">
                                    <a href="#" id="buttonBorrowRoomModal" class="btn-custom px-3 py-2"
                                        >Details
                                        <span class="icon-long-arrow-right"></span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
