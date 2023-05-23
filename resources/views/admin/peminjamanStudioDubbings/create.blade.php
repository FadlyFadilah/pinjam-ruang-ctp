@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.peminjamanStudioDubbing.title_singular') }}
        </div>

        <div class="card-body">
            <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#alur">
                        <button type="button" class="step-trigger" role="tab" aria-controls="alur" id="alur-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">Alur Peminjaman studio Dubbing</span>
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
                    <form method="POST" action="{{ route('admin.peminjaman-studio-dubbings.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div id="alur" class="content" role="tabpanel" aria-labelledby="alur-trigger">
                            <h1>SOP</h1>
                            <p>1.	Tenant  wajib mengisi formulir yang ada di website :  website :  http://pelita.cimahitechnopark.id/<br>
                                2.	Apabila ada jadwal yang kosong, tenant dapat booking Studio Dubbing sesuai jadwal yang tersedia<br>
                                3.	CS BITC akan berkoordinasi dengan Koordinator Gedung bitc, apabila sudah acc CS BITC akan menghubungi tenant<br>
                                4.	Waktu yang dapat digunakan untuk Studio Dubbing : (Tenant yang menyewa Co Working Space (dalam 1 bulan yaitu 16 jam), dan untuk tenant yang menyewa Space ruang kantor (dalam 1 bulan yaitu 32 jam))<br>
                                5.	Apabila ada asset yang akan digunakan di ruang Studio, tenant wajib izin ke Pengelola Gedung BITC<br>
                                6.	Pada saat penggunaan Ruang Studio Dubbing, tenant wajib menjaga dan menaati peraturan yang telah di sepakati

                                </p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="checkboxId" onchange="toggleButton()">
                                <label class="form-check-label" for="checkbox">
                                    Ya, saya sudah membaca dan saya setuju atas prosedur diatas.
                                </label>
                            </div>
                            <button id="nextButton" class="btn btn-primary" onclick="stepper.next()" disabled>Next</button>

                        </div>
                        <div id="data" class="content" role="tabpanel" aria-labelledby="data-trigger">

                            <div class="form-group">
                                <label class="required" for="nama">{{ trans('cruds.peminjamanStudioDubbing.fields.nama') }}</label>
                                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama"
                                    id="nama" value="{{ old('nama', '') }}" required>
                                @if ($errors->has('nama'))
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanStudioDubbing.fields.nama_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="ktp">{{ trans('cruds.peminjamanStudioDubbing.fields.ktp') }}</label>
                                <input class="form-control {{ $errors->has('ktp') ? 'is-invalid' : '' }}" type="text" name="ktp"
                                    id="ktp" value="{{ old('ktp', '') }}" required>
                                @if ($errors->has('ktp'))
                                    <span class="text-danger">{{ $errors->first('ktp') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanStudioDubbing.fields.ktp_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="alamat">{{ trans('cruds.peminjamanStudioDubbing.fields.alamat') }}</label>
                                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat">{{ old('alamat') }}</textarea>
                                @if ($errors->has('alamat'))
                                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanStudioDubbing.fields.alamat_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="no_hp">{{ trans('cruds.peminjamanStudioDubbing.fields.no_hp') }}</label>
                                <input class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" type="text"
                                    name="no_hp" id="no_hp" value="{{ old('no_hp', '') }}" required>
                                @if ($errors->has('no_hp'))
                                    <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanStudioDubbing.fields.no_hp_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="email">{{ trans('cruds.peminjamanStudioDubbing.fields.email') }}</label>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                    name="email" id="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanStudioDubbing.fields.email_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="booking">{{ trans('cruds.peminjamanStudioDubbing.fields.booking') }}</label>
                                <input class="form-control date {{ $errors->has('booking') ? 'is-invalid' : '' }}" type="text"
                                    name="booking" id="booking" value="{{ old('booking') }}" required>
                                @if ($errors->has('booking'))
                                    <span class="text-danger">{{ $errors->first('booking') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanStudioDubbing.fields.booking_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="selesai_booking">{{ trans('cruds.peminjamanStudioDubbing.fields.selesai_booking') }}</label>
                                <input class="form-control date {{ $errors->has('selesai_booking') ? 'is-invalid' : '' }}" type="text"
                                    name="selesai_booking" id="selesai_booking" value="{{ old('selesai_booking') }}">
                                @if ($errors->has('selesai_booking'))
                                    <span class="text-danger">{{ $errors->first('selesai_booking') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanStudioDubbing.fields.selesai_booking_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label>{{ trans('cruds.peminjamanStudioDubbing.fields.operator') }}</label>
                                @foreach (App\Models\PeminjamanStudioDubbing::OPERATOR_RADIO as $key => $label)
                                    <div class="form-check {{ $errors->has('operator') ? 'is-invalid' : '' }}">
                                        <input class="form-check-input" type="radio" id="operator_{{ $key }}"
                                            name="operator" value="{{ $key }}"
                                            {{ old('operator', 'tidak') === (string) $key ? 'checked' : '' }}>
                                        <label class="form-check-label" for="operator_{{ $key }}">{{ $label }}</label>
                                    </div>
                                @endforeach
                                @if ($errors->has('operator'))
                                    <span class="text-danger">{{ $errors->first('operator') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanStudioDubbing.fields.operator_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <div class="form-check {{ $errors->has('persetujuan') ? 'is-invalid' : '' }}">
                                    <input class="form-check-input" type="checkbox" name="persetujuan" id="persetujuan" value="1"
                                        required {{ old('persetujuan', 0) == 1 ? 'checked' : '' }}>
                                    <label class="required form-check-label" for="persetujuan">Dengan ini saya bertanggung jawab atas
                                        kualitas dan kuantitas sarana dan prasarana pda Studio Dubbing Selama Masa Peminjaman. Dan Bersedia
                                        untuk Bertanggung Jawab apabila ada kerusakan/kehilangan</label>
                                </div>
                                @if ($errors->has('persetujuan'))
                                    <span class="text-danger">{{ $errors->first('persetujuan') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanStudioDubbing.fields.persetujuan_helper') }}</span>
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