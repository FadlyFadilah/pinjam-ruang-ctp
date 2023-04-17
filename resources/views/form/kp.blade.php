@extends('layouts.default')
@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('vendor/technext/vacation-rental/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ route('home') }}">Beranda <i class="fa fa-chevron-right"></i></a></span> <span>Kerja Praktek <i class="fa fa-chevron-right"></i></span></p>
          <h1 class="mb-0 bread">Form Daftar Kerja Praktek</h1>
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
				<h3>Pendaftaran Kerja Praktek</h3>
				
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
					<div class="col-sm-6 pb-3">
						<label for="examplepname">Nama Perguruan Tinggi</label>
						<input type="text" class="form-control" id="examplepname">
					</div>
					<div class="col-sm-6 pb-3">
						<label for="examplepcluster">Lama Kerja Praktek</label>
						<input type="text" class="form-control" id="examplepcluster">
					</div>
				</div>
				<button type="submit" class="btn btn-secondary btn-lg float-right">Send Message</button>
			</div>
		</div>
	</div>
</section>

@endsection
