@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.peminjamanCh.title_singular') }}
        </div>

        <div class="card-body">
            <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#alur">
                        <button type="button" class="step-trigger" role="tab" aria-controls="alur" id="alur-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">Penyewaan Conventional Hall BITC</span>
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
                    <form method="POST" action="{{ route('admin.peminjaman-ches.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div id="alur" class="content" role="tabpanel" aria-labelledby="alur-trigger">
                            <h1>SOP</h1>
                            <p>
                                {{-- 1. Pendaftaran melalui Web & konfirmasi ke wa CS Bitc.<br>
                                2. Pengajuan Surat syarat bersewa ( isi surat melimputi data Kegiatan Acara) dengan di upload di web dan atau di kirim via WA ke kontak CS Bitc, untuk info lebih jelas dapat menghubungi kontak CS Bitc. <br>
                                3. Evaluasi Persyaratan Oleh Petugas.<br>
                                4. Apabila telah ada info acc/verikasi penyewaan dapat berlanjut dari petugas/di hubungi oleh petugas maka calon wajib retribusi membayarar retribusi.<br>
                                5. Persetujuan Menggunakan Gedung BITC.<br>
                                Note : Informasi lebih lanjut/lebih jelas hubungi kontak CS BITC (088220972773). --}}
                                1. Mengisi formulir yang ada di website : Website : http://pelita.cimahitechnopark.id/.<br>
                                2. Mengajukan Surat sebagai syarat isi surat meliputi (Data Kegiatan Acara seperti, Tema & Nama kegiatan acara, Tanggal lengkap berlangsungnya acara, Jumlah peserta acara) surat tersebut diajukan/di kirim  ke kontak WA CS BITC.<br>
                                3. Evaluasi Persyaratan Oleh Petugas.<br>
                                4. Apabila telah ada info acc/verikasi maka dapat berlanjut dan calon wajib retribusi membayar Retribusi.<br>
                                5. Persetujuan Menggunakan Gedung BITC.<br>

                                Note : Untuk Informasi lebih lanjut/lebih jelas mengenai alur ini hubungi kontak CS BITC di WA (088220972773).
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
                                <label class="required" for="nama">{{ trans('cruds.peminjamanCh.fields.nama') }}</label>
                                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text"
                                    name="nama" id="nama" value="{{ old('nama', '') }}" required>
                                @if ($errors->has('nama'))
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanCh.fields.nama_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="ktp">{{ trans('cruds.peminjamanCh.fields.ktp') }}</label>
                                <input class="form-control {{ $errors->has('ktp') ? 'is-invalid' : '' }}" type="text"
                                    name="ktp" id="ktp" value="{{ old('ktp', '') }}" required>
                                @if ($errors->has('ktp'))
                                    <span class="text-danger">{{ $errors->first('ktp') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanCh.fields.ktp_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="alamat">{{ trans('cruds.peminjamanCh.fields.alamat') }}</label>
                                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat">{{ old('alamat') }}</textarea>
                                @if ($errors->has('alamat'))
                                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanCh.fields.alamat_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="no_hp">{{ trans('cruds.peminjamanCh.fields.no_hp') }}</label>
                                <input class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" type="text"
                                    name="no_hp" id="no_hp" value="{{ old('no_hp', '') }}" required>
                                @if ($errors->has('no_hp'))
                                    <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanCh.fields.no_hp_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="email">{{ trans('cruds.peminjamanCh.fields.email') }}</label>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                    name="email" id="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanCh.fields.email_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="tujuan">{{ trans('cruds.peminjamanCh.fields.tujuan') }}</label>
                                <input class="form-control {{ $errors->has('tujuan') ? 'is-invalid' : '' }}" type="text"
                                    name="tujuan" id="tujuan" value="{{ old('tujuan', '') }}" required>
                                @if ($errors->has('tujuan'))
                                    <span class="text-danger">{{ $errors->first('tujuan') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanCh.fields.tujuan_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="booking">{{ trans('cruds.peminjamanCh.fields.booking') }}</label>
                                <input class="form-control date {{ $errors->has('booking') ? 'is-invalid' : '' }}"
                                    type="text" name="booking" id="booking" value="{{ old('booking') }}" required>
                                @if ($errors->has('booking'))
                                    <span class="text-danger">{{ $errors->first('booking') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanCh.fields.booking_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="selesai">{{ trans('cruds.peminjamanCh.fields.selesai') }}</label>
                                <input class="form-control date {{ $errors->has('selesai') ? 'is-invalid' : '' }}"
                                    type="text" name="selesai" id="selesai" value="{{ old('selesai') }}">
                                @if ($errors->has('selesai'))
                                    <span class="text-danger">{{ $errors->first('selesai') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanCh.fields.selesai_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="jumlah">{{ trans('cruds.peminjamanCh.fields.jumlah') }}</label>
                                <input class="form-control {{ $errors->has('jumlah') ? 'is-invalid' : '' }}"
                                    type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', '') }}"
                                    step="1" required>
                                @if ($errors->has('jumlah'))
                                    <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanCh.fields.jumlah_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label>{{ trans('cruds.peminjamanCh.fields.infokus') }}</label>
                                @foreach (App\Models\PeminjamanCh::INFOKUS_RADIO as $key => $label)
                                    <div class="form-check {{ $errors->has('infokus') ? 'is-invalid' : '' }}">
                                        <input class="form-check-input" type="radio" id="infokus_{{ $key }}"
                                            name="infokus" value="{{ $key }}"
                                            {{ old('infokus', '') === (string) $key ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="infokus_{{ $key }}">{{ $label }}</label>
                                    </div>
                                @endforeach
                                @if ($errors->has('infokus'))
                                    <span class="text-danger">{{ $errors->first('infokus') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanCh.fields.infokus_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <div class="form-check {{ $errors->has('persetujuan') ? 'is-invalid' : '' }}">
                                    <input class="form-check-input" type="checkbox" name="persetujuan" id="persetujuan"
                                        value="1" required {{ old('persetujuan', 0) == 1 ? 'checked' : '' }}>
                                    <label class="required form-check-label"
                                        for="persetujuan">{{ trans('cruds.peminjamanCh.fields.persetujuan') }}</label>
                                </div>
                                @if ($errors->has('persetujuan'))
                                    <span class="text-danger">{{ $errors->first('persetujuan') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.peminjamanCh.fields.persetujuan_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <div class="form-check {{ $errors->has('persetujuan_2') ? 'is-invalid' : '' }}">
                                    <input class="form-check-input" type="checkbox" name="persetujuan_2"
                                        id="persetujuan_2" value="1" required
                                        {{ old('persetujuan_2', 0) == 1 ? 'checked' : '' }}>
                                    <label class="required form-check-label"
                                        for="persetujuan_2">{{ trans('cruds.peminjamanCh.fields.persetujuan_2') }}</label>
                                </div>
                                @if ($errors->has('persetujuan_2'))
                                    <span class="text-danger">{{ $errors->first('persetujuan_2') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.peminjamanCh.fields.persetujuan_2_helper') }}</span>
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
