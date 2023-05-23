@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.peminjamanBarang.title_singular') }}
        </div>

        <div class="card-body">
            <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#alur">
                        <button type="button" class="step-trigger" role="tab" aria-controls="alur" id="alur-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">Alur Peminjaman Barang</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#data">
                        <button type="button" class="step-trigger" role="tab" aria-controls="data" id="data-trigger">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label">Data Pemohon</span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <form method="POST" action="{{ route('admin.peminjaman-barangs.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div id="alur" class="content" role="tabpanel" aria-labelledby="alur-trigger">
                            <h1>SOP</h1>
                            <p>
                                1.	Peminjam yang akan meminjam Wacom, Oculus, dan Halobox wajib mengisi formulir yang tersedia di website :  http://pelita.cimahitechnopark.id/<br>
                                2.	Setelah mengisi Formulir yang ada di website :  pinjam-ruang-ctp.test, CS akan mencocokan jadwal <br>
                                3.	Admin akan mendispo peminjaman tersebut ke Kepala UPT dan Kasubag TU<br>
                                4.	Apabila disepekati, Admin akan ACC kegiatan tersbut dan peminjam boleh menggunakan nya sesuai dgn tgl yg disepakati<br>
                                5.	Peminjam wajib menjaga barang tersebut sesuai dengan kondisi yang ada pada awal dan tidak rusak<br>
                                6.	Peminjam wajib mengembalikan barang tersebut sesuai dengan tanggal yang disepakati<br>
                                7.	Apabila barang tersebut rusak atau hilang Peminjam wajib mengganti dan bertanggung jawab atas barang tersebut

                            </p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="checkboxId" onchange="toggleButton()">
                                <label class="form-check-label" for="checkbox">
                                    Ya saya sudah mengetahui nya.
                                </label>
                            </div>
                            <button id="nextButton" class="btn btn-primary" onclick="stepper.next()" disabled>Next</button>

                        </div>
                        <div id="data" class="content" role="tabpanel" aria-labelledby="data-trigger">

                            <div class="form-group">
                                <label class="required"
                                    for="barang_id">{{ trans('cruds.peminjamanBarang.fields.barang') }}</label>
                                <select class="form-control {{ $errors->has('barang') ? 'is-invalid' : '' }}"
                                    name="barang_id" id="barang_id" required>
                                    @foreach ($barangs as $id => $entry)
                                        <option value="{{ $id }}" {{ old('barang_id') == $id ? 'selected' : '' }}>
                                            {{ $entry }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('barang'))
                                    <span class="text-danger">{{ $errors->first('barang') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanBarang.fields.barang_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="nama_usaha">{{ trans('cruds.peminjamanBarang.fields.nama_usaha') }}</label>
                                <input class="form-control {{ $errors->has('nama_usaha') ? 'is-invalid' : '' }}"
                                    type="text" name="nama_usaha" id="nama_usaha" value="{{ old('nama_usaha', '') }}"
                                    required>
                                @if ($errors->has('nama_usaha'))
                                    <span class="text-danger">{{ $errors->first('nama_usaha') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.peminjamanBarang.fields.nama_usaha_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="alamat">{{ trans('cruds.peminjamanBarang.fields.alamat') }}</label>
                                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat">{{ old('alamat') }}</textarea>
                                @if ($errors->has('alamat'))
                                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanBarang.fields.alamat_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="name">{{ trans('cruds.peminjamanBarang.fields.name') }}</label>
                                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                                    name="name" id="name" value="{{ old('name', '') }}" required>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanBarang.fields.name_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="ktp">{{ trans('cruds.peminjamanBarang.fields.ktp') }}</label>
                                <input class="form-control {{ $errors->has('ktp') ? 'is-invalid' : '' }}" type="text"
                                    name="ktp" id="ktp" value="{{ old('ktp', '') }}" required>
                                @if ($errors->has('ktp'))
                                    <span class="text-danger">{{ $errors->first('ktp') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanBarang.fields.ktp_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="booking">{{ trans('cruds.peminjamanBarang.fields.booking') }}</label>
                                <input class="form-control date {{ $errors->has('booking') ? 'is-invalid' : '' }}"
                                    type="text" name="booking" id="booking" value="{{ old('booking') }}" required>
                                @if ($errors->has('booking'))
                                    <span class="text-danger">{{ $errors->first('booking') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.peminjamanBarang.fields.booking_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="tujuan">{{ trans('cruds.peminjamanBarang.fields.tujuan') }}</label>
                                <input class="form-control {{ $errors->has('tujuan') ? 'is-invalid' : '' }}"
                                    type="text" name="tujuan" id="tujuan" value="{{ old('tujuan', '') }}"
                                    required>
                                @if ($errors->has('tujuan'))
                                    <span class="text-danger">{{ $errors->first('tujuan') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanBarang.fields.tujuan_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="no_hp">{{ trans('cruds.peminjamanBarang.fields.no_hp') }}</label>
                                <input class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}"
                                    type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', '') }}"
                                    required>
                                @if ($errors->has('no_hp'))
                                    <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanBarang.fields.no_hp_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="email">{{ trans('cruds.peminjamanBarang.fields.email') }}</label>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    type="email" name="email" id="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanBarang.fields.email_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                <button class="btn btn-danger" type="submit">
                                    {{ trans('global.save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function toggleButton() {
            var checkbox = document.getElementById("checkboxId");
            var nextButton = document.getElementById("nextButton");

            if (checkbox.checked) {
                nextButton.disabled = false;
            } else {
                nextButton.disabled = true;
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>
@endsection
