@extends('layouts.default')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('vendor/technext/vacation-rental/images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ route('home') }}">Beranda <i class="fa fa-chevron-right"></i></a></span> <span>Barang <i class="fa fa-chevron-right"></i></span></p>
          <h1 class="mb-0 bread">Daftar Barang</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section bg-light ftco-no-pt ftco-no-pb">
          <div class="container-fluid px-md-0">
              <div class="row no-gutters">
              @foreach ($barangs as $item)
                <div class="col-5 mx-auto text-center">
                    <div class="card item-wrap p-2 m-4">
                        <a href="#" class="img" style="background-image: url('{{ asset('vendor/technext/vacation-rental/images/item-'. rand(1, 6) . '.jpg') }}');"></a>
                        <div class="half left-arrow d-flex align-items-center">
                            <div class="text p-4 p-xl-5 text-center">
                                <p class="star mb-0"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></p>
                                <p class="mb-0">{{ $item->nama_barang }}</p>
                                <h3 class="mb-3"><a href="#">{{ $item->nama_barang }}</a></h3>
                                <ul class="list-accomodation">
                                    <li><span>Lokasi:</span> {{ $item->lokasi }}</li>
                                    <li><span>Deskripsi:</span> {{ $item->deskripsi }}</li>
                                </ul>
                                <p class="pt-1"><a href="javascript:void(0)" id="buttonBorrowRoomModal" class="btn-custom px-3 py-2" data-toggle="modal" data-target="#borrowRoomModal" data-item-id="{{ $item->id }}" data-item-name="{{ $item->name }}">Pinjam Barang Ini <span class="icon-long-arrow-right"></span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach
              </div>
          </div>
      </section>
@endsection 
