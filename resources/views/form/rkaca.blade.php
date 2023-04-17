@extends('layouts.default')
@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('vendor/technext/vacation-rental/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs mb-2">
                <span class="mr-2">
                    <a href="{{ route('home') }}">Beranda <i class="fa fa-chevron-right"></i></a>
                </span>
                <span class="mr-2">
                    <a href="{{ route('rooms') }}">Ruangan <i class="fa fa-chevron-right"></i></a>
                </span>  
                <span>
                    Ruang Kaca<i class="fa fa-chevron-right"></i>
                </span></p>
          <h1 class="mb-0 bread">Form Pinjam Ruang Kaca</h1>
        </div>
      </div>
    </div>
  </section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-md-10 offset-md-1">
				<span class="anchor" id="formComplex"></span>
				<hr class="my-5">
				<h3>Peminjaman Ruang Kaca</h3>
				
				<!-- form complex example -->
				<div class="form-row mt-4">
					<div class="col-sm-6 pb-3">
						<label for="exampleFirst">Nama Depan</label>
						<input type="text" class="form-control" id="exampleFirst">
					</div>
					<div class="col-sm-6 pb-3">
						<label for="exampleLast">Nama Belakang</label>
						<input type="text" class="form-control" id="exampleLast">
					</div>
					<div class="col-sm-12 pb-3">
						<label for="exampleFirst">Alamat</label>
						<input type="text" class="form-control" id="exampleaddress">
					</div>
					<div class="col-sm-6 pb-3">
						<label for="exampleCity">Kota</label>
						<input type="text" class="form-control" id="exampleCity">
					</div>
					<div class="col-sm-3 pb-3">
						<label for="exampleSt">Provinsi</label>
						<select class="form-control" id="exampleSt">
							<option>Pilih Provinsi</option>
						</select>
					</div>
					<div class="col-sm-3 pb-3">
						<label for="exampleZip">Kode Pos</label>
						<input type="text" class="form-control" id="exampleZip">
					</div>
                    <div class="col-sm-6 pb-3">
						<label for="examplektp">No. KTP</label>
						<input type="text" class="form-control" id="examplektp">
					</div>
                    <div class="col-sm-6 pb-3">
						<label for="examplektp">Jumlah Peserta</label>
						<input type="text" class="form-control" id="examplektp">
					</div>
					<div class="col-sm-6 pb-3">
                        <label for="mulaibo">Tanggal Booking</label>
                        <input type="date" id="mulaibo" name="mulaibo">
					</div>
					<div class="col-sm-6 pb-3">
                        <label for="selesaibo">Selesai Booking</label>
                        <input type="date" id="selesaibo" name="selesaibo">
					</div>
					<div class="col-sm-12 pb-3">
						<label for="exampleium">Agreement</label>
						<input type="text" class="form-control" id="exampleium">
					</div>
				</div>
				<button type="submit" class="btn btn-secondary btn-lg float-right">Send Message</button>
			</div>
		</div>
	</div>
</section>

@endsection
