@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.ruangctp.title_singular') }}
        </div>

        <div class="card-body">
            <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#alur">
                        <button type="button" class="step-trigger" role="tab" aria-controls="alur" id="alur-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">Alur Peminjaman Ruangan Cimahi Technopark</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#data-pemohon">
                        <button type="button" class="step-trigger" role="tab" aria-controls="data-pemohon"
                            id="data-pemohon-trigger">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label">Data Pemohon</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#data-instansi">
                        <button type="button" class="step-trigger" role="tab" aria-controls="data-instansi"
                            id="data-instansi-trigger">
                            <span class="bs-stepper-circle">3</span>
                            <span class="bs-stepper-label">Data Instansi / Pribadi</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#informasi-acara">
                        <button type="button" class="step-trigger" role="tab" aria-controls="informasi-acara"
                            id="informasi-acara-trigger">
                            <span class="bs-stepper-circle">4</span>
                            <span class="bs-stepper-label">Informasi Acara / Kegiatan</span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <form method="POST" id="form" action="{{ route('admin.ruangctps.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div id="alur" class="content" role="tabpanel" aria-labelledby="alur-trigger">
                            <h1>SOP</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis odio possimus magnam
                                provident quisquam voluptate id illo consequatur maxime. Vel dolorum exercitationem
                                similique dolore aliquid amet magni praesentium consequatur, maiores suscipit, ut doloribus
                                veniam, eum ipsum ea? Mollitia voluptatum minima placeat sint tenetur vel ipsam aspernatur
                                eligendi, facere cupiditate quam minus est ad, voluptate voluptatem, aliquam deleniti dicta.
                                Dignissimos totam soluta dicta aut necessitatibus voluptates rerum libero adipisci
                                aspernatur ab architecto deserunt repudiandae mollitia excepturi odio, nesciunt nihil
                                dolorum? Dolores aperiam sed at veniam, sunt sit fugiat? Consequatur quisquam veritatis,
                                mollitia, sit dicta et facilis laborum reiciendis tempora a iure.</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="checkboxId" onchange="toggleButton()">
                                <label class="form-check-label" for="checkbox">
                                    Ya saya sudah mengetahui nya.
                                </label>
                            </div>
                            <button id="nextButton" class="btn btn-primary" onclick="stepper.next()" disabled>Next</button>

                        </div>
                        <div id="data-pemohon" class="content" role="tabpanel" aria-labelledby="data-pemohon-trigger">
                            <div class="form-group">
                                <label class="required"
                                    for="ruangan_id">{{ trans('cruds.ruangctp.fields.ruangan') }}</label>
                                <select class="form-control {{ $errors->has('ruangan') ? 'is-invalid' : '' }}"
                                    name="ruangan_id" id="ruangan_id" required>
                                    @foreach ($ruangans as $id => $entry)
                                        <option value="{{ $id }}"
                                            {{ old('ruangan_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback" id="ruangan-error"></span>
                                @if ($errors->has('ruangan'))
                                    <span class="text-danger">{{ $errors->first('ruangan') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.ruangan_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required">{{ trans('cruds.ruangctp.fields.skpd') }}</label>
                                <select class="form-control {{ $errors->has('skpd') ? 'is-invalid' : '' }}" name="skpd"
                                    id="skpd" required>
                                    <option value disabled {{ old('skpd', null) === null ? 'selected' : '' }}>
                                        {{ trans('global.pleaseSelect') }}</option>
                                    @foreach (App\Models\Ruangctp::SKPD_SELECT as $key => $label)
                                        <option value="{{ $key }}"
                                            {{ old('skpd', '') === (string) $key ? 'selected' : '' }}>
                                            {{ $label }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback" id="skpd-error"></span>
                                @if ($errors->has('skpd'))
                                    <span class="text-danger">{{ $errors->first('skpd') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.skpd_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required">{{ trans('cruds.ruangctp.fields.bidang_kegiatan') }}</label>
                                <select class="form-control {{ $errors->has('bidang_kegiatan') ? 'is-invalid' : '' }}"
                                    name="bidang_kegiatan" id="bidang_kegiatan" required>
                                    <option value disabled {{ old('bidang_kegiatan', null) === null ? 'selected' : '' }}>
                                        {{ trans('global.pleaseSelect') }}</option>
                                    @foreach (App\Models\Ruangctp::BIDANG_KEGIATAN_SELECT as $key => $label)
                                        <option value="{{ $key }}"
                                            {{ old('bidang_kegiatan', '') === (string) $key ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback" id="bidang-kegiatan-error"></span>
                                @if ($errors->has('bidang_kegiatan'))
                                    <span class="text-danger">{{ $errors->first('bidang_kegiatan') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.bidang_kegiatan_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="nama">{{ trans('cruds.ruangctp.fields.nama') }}</label>
                                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text"
                                    name="nama" id="nama" value="{{ old('nama', '') }}" required>
                                <span class="invalid-feedback" id="nama-error"></span>
                                @if ($errors->has('nama'))
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.nama_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="alamat">{{ trans('cruds.ruangctp.fields.alamat') }}</label>
                                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat"
                                    required>{{ old('alamat') }}</textarea>
                                <span class="invalid-feedback" id="alamat-error"></span>
                                @if ($errors->has('alamat'))
                                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.alamat_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="kelurahan">{{ trans('cruds.ruangctp.fields.kelurahan') }}</label>
                                <input class="form-control {{ $errors->has('kelurahan') ? 'is-invalid' : '' }}"
                                    type="text" name="kelurahan" id="kelurahan" value="{{ old('kelurahan', '') }}"
                                    required>
                                <span class="invalid-feedback" id="kelurahan-error"></span>
                                @if ($errors->has('kelurahan'))
                                    <span class="text-danger">{{ $errors->first('kelurahan') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.kelurahan_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="kecamatan">{{ trans('cruds.ruangctp.fields.kecamatan') }}</label>
                                <input class="form-control {{ $errors->has('kecamatan') ? 'is-invalid' : '' }}"
                                    type="text" name="kecamatan" id="kecamatan" value="{{ old('kecamatan', '') }}"
                                    required>
                                <span class="invalid-feedback" id="kecamatan-error"></span>
                                @if ($errors->has('kecamatan'))
                                    <span class="text-danger">{{ $errors->first('kecamatan') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.kecamatan_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="kota">{{ trans('cruds.ruangctp.fields.kota') }}</label>
                                <input class="form-control {{ $errors->has('kota') ? 'is-invalid' : '' }}" type="text"
                                    name="kota" id="kota" value="{{ old('kota', '') }}" required>
                                <span class="invalid-feedback" id="kota-error"></span>
                                @if ($errors->has('kota'))
                                    <span class="text-danger">{{ $errors->first('kota') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.kota_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="kodepos">{{ trans('cruds.ruangctp.fields.kodepos') }}</label>
                                <input class="form-control {{ $errors->has('kodepos') ? 'is-invalid' : '' }}"
                                    type="text" name="kodepos" id="kodepos" value="{{ old('kodepos', '') }}"
                                    required>
                                <span class="invalid-feedback" id="kodepos-error"></span>
                                @if ($errors->has('kodepos'))
                                    <span class="text-danger">{{ $errors->first('kodepos') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.kodepos_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="no">{{ trans('cruds.ruangctp.fields.no') }}</label>
                                <input class="form-control {{ $errors->has('no') ? 'is-invalid' : '' }}" type="text"
                                    name="no" id="no" value="{{ old('no', '') }}" required>
                                <span class="invalid-feedback" id="no-error"></span>
                                @if ($errors->has('no'))
                                    <span class="text-danger">{{ $errors->first('no') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.no_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="ktp">{{ trans('cruds.ruangctp.fields.ktp') }}</label>
                                <input class="form-control {{ $errors->has('ktp') ? 'is-invalid' : '' }}" type="text"
                                    name="ktp" id="ktp" value="{{ old('ktp', '') }}" required>
                                <span class="invalid-feedback" id="ktp-error"></span>
                                @if ($errors->has('ktp'))
                                    <span class="text-danger">{{ $errors->first('ktp') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.ktp_helper') }}</span>
                            </div>
                            <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                            <button id="valid" class="btn btn-primary"
                                onclick="validateForm(); hidebutton();">Next</button>
                            <button id="next" hidden class="btn btn-primary" onclick="stepper.next()">Next</button>
                        </div>
                        <div id="data-instansi" class="content" role="tabpanel" aria-labelledby="data-instansi-trigger">
                            <div class="form-group">
                                <label class="required"
                                    for="instansi">{{ trans('cruds.ruangctp.fields.instansi') }}</label>
                                <input class="form-control {{ $errors->has('instansi') ? 'is-invalid' : '' }}"
                                    type="text" name="instansi" id="instansi" value="{{ old('instansi', '') }}"
                                    required>
                                <span class="invalid-feedback" id="instansi-error"></span>
                                @if ($errors->has('instansi'))
                                    <span class="text-danger">{{ $errors->first('instansi') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.instansi_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label
                                    for="statusdiinstansi">{{ trans('cruds.ruangctp.fields.statusdiinstansi') }}</label>
                                <input class="form-control {{ $errors->has('statusdiinstansi') ? 'is-invalid' : '' }}"
                                    type="text" name="statusdiinstansi" id="statusdiinstansi"
                                    value="{{ old('statusdiinstansi', '') }}">
                                <span class="invalid-feedback" id="statusdiinstansi-error"></span>
                                @if ($errors->has('statusdiinstansi'))
                                    <span class="text-danger">{{ $errors->first('statusdiinstansi') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.ruangctp.fields.statusdiinstansi_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="bidanginstansi">{{ trans('cruds.ruangctp.fields.bidanginstansi') }}</label>
                                <input class="form-control {{ $errors->has('bidanginstansi') ? 'is-invalid' : '' }}"
                                    type="text" name="bidanginstansi" id="bidanginstansi"
                                    value="{{ old('bidanginstansi', '') }}" required>
                                <span class="invalid-feedback" id="bidanginstansi-error"></span>
                                @if ($errors->has('bidanginstansi'))
                                    <span class="text-danger">{{ $errors->first('bidanginstansi') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.bidanginstansi_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="alamatinstansi">{{ trans('cruds.ruangctp.fields.alamatinstansi') }}</label>
                                <textarea class="form-control {{ $errors->has('alamatinstansi') ? 'is-invalid' : '' }}" name="alamatinstansi"
                                    id="alamatinstansi">{{ old('alamatinstansi') }}</textarea>
                                <span class="invalid-feedback" id="alamatinstansi-error"></span>
                                @if ($errors->has('alamatinstansi'))
                                    <span class="text-danger">{{ $errors->first('alamatinstansi') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.alamatinstansi_helper') }}</span>
                            </div>
                            <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                            <button id="valid2" class="btn btn-primary"
                                onclick="validateForm2(); hidebutton2();">Next</button>
                            <button id="next2" hidden class="btn btn-primary" onclick="stepper.next()">Next</button>
                        </div>
                        <div id="informasi-acara" class="content" role="tabpanel"
                            aria-labelledby="informasi-acara-trigger">
                            <div class="form-group">
                                <label class="required" for="mulai">{{ trans('cruds.ruangctp.fields.mulai') }}</label>
                                <input class="form-control date {{ $errors->has('mulai') ? 'is-invalid' : '' }}"
                                    type="text" name="mulai" id="mulai" value="{{ old('mulai') }}" required>
                                @if ($errors->has('mulai'))
                                    <span class="text-danger">{{ $errors->first('mulai') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.mulai_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="mulaijam">{{ trans('cruds.ruangctp.fields.mulaijam') }}</label></br>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary active">
                                        <input type="radio" value="08:00" name="mulaijam" id="mulaijam_1"
                                            autocomplete="off">
                                        08:00
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" value="09:00" name="mulaijam" id="mulaijam_2"
                                            autocomplete="off">
                                        09:00
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" value="10:00" name="mulaijam" id="mulaijam_3"
                                            autocomplete="off">
                                        10:00
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" value="11:00" name="mulaijam" id="mulaijam_4"
                                            autocomplete="off">
                                        11:00
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" value="12:00" name="mulaijam" id="mulaijam_5"
                                            autocomplete="off">
                                        12:00
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" value="13:00" name="mulaijam" id="mulaijam_6"
                                            autocomplete="off">
                                        13:00
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" value="14:00" name="mulaijam" id="mulaijam_7"
                                            autocomplete="off">
                                        14:00
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" value="15:00" name="mulaijam" id="mulaijam_8"
                                            autocomplete="off">
                                        15:00
                                    </label>
                                </div>
                                @if ($errors->has('mulaijam'))
                                    <span class="text-danger">{{ $errors->first('mulaijam') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.mulaijam_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="selesai">{{ trans('cruds.ruangctp.fields.selesai') }}</label>
                                <input class="form-control date {{ $errors->has('selesai') ? 'is-invalid' : '' }}"
                                    type="text" name="selesai" id="selesai" value="{{ old('selesai') }}" required>
                                @if ($errors->has('selesai'))
                                    <span class="text-danger">{{ $errors->first('selesai') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.selesai_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="selesaijam">{{ trans('cruds.ruangctp.fields.selesaijam') }}</label></br>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary active">
                                        <input type="radio" value="09:00" name="selesaijam" id="selesaijam_1"
                                            autocomplete="off">
                                        09:00
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" value="10:00" name="selesaijam" id="selesaijam_2"
                                            autocomplete="off">
                                        10:00
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" value="11:00" name="selesaijam" id="selesaijam_3"
                                            autocomplete="off">
                                        11:00
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" value="12:00" name="selesaijam" id="selesaijam_4"
                                            autocomplete="off">
                                        12:00
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" value="13:00" name="selesaijam" id="selesaijam_5"
                                            autocomplete="off">
                                        13:00
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" value="14:00" name="selesaijam" id="selesaijam_6"
                                            autocomplete="off">
                                        14:00
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" value="15:00" name="selesaijam" id="selesaijam_7"
                                            autocomplete="off">
                                        15:00
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" value="16:00" name="selesaijam" id="selesaijam_8"
                                            autocomplete="off">
                                        16:00
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" value="17:00" name="selesaijam" id="selesaijam_9"
                                            autocomplete="off">
                                        17:00
                                    </label>
                                </div>
                                @if ($errors->has('selesaijam'))
                                    <span class="text-danger">{{ $errors->first('selesaijam') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.selesaijam_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="nama_acara">{{ trans('cruds.ruangctp.fields.nama_acara') }}</label>
                                <input class="form-control {{ $errors->has('nama_acara') ? 'is-invalid' : '' }}"
                                    type="text" name="nama_acara" id="nama_acara"
                                    value="{{ old('nama_acara', '') }}" required>
                                @if ($errors->has('nama_acara'))
                                    <span class="text-danger">{{ $errors->first('nama_acara') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.nama_acara_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="jumlah_peserta">{{ trans('cruds.ruangctp.fields.jumlah_peserta') }}</label>
                                <input class="form-control {{ $errors->has('jumlah_peserta') ? 'is-invalid' : '' }}"
                                    type="text" name="jumlah_peserta" id="jumlah_peserta"
                                    value="{{ old('jumlah_peserta', '') }}" required>
                                @if ($errors->has('jumlah_peserta'))
                                    <span class="text-danger">{{ $errors->first('jumlah_peserta') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.ruangctp.fields.jumlah_peserta_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="narasumber">{{ trans('cruds.ruangctp.fields.narasumber') }}</label>
                                <input class="form-control {{ $errors->has('narasumber') ? 'is-invalid' : '' }}"
                                    type="text" name="narasumber" id="narasumber"
                                    value="{{ old('narasumber', '') }}" required>
                                @if ($errors->has('narasumber'))
                                    <span class="text-danger">{{ $errors->first('narasumber') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.narasumber_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="outpu">{{ trans('cruds.ruangctp.fields.outpu') }}</label>
                                <input class="form-control {{ $errors->has('outpu') ? 'is-invalid' : '' }}"
                                    type="text" name="outpu" id="outpu" value="{{ old('outpu', '') }}">
                                @if ($errors->has('outpu'))
                                    <span class="text-danger">{{ $errors->first('outpu') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.outpu_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="outcome">{{ trans('cruds.ruangctp.fields.outcome') }}</label>
                                <input class="form-control {{ $errors->has('outcome') ? 'is-invalid' : '' }}"
                                    type="text" name="outcome" id="outcome" value="{{ old('outcome', '') }}">
                                @if ($errors->has('outcome'))
                                    <span class="text-danger">{{ $errors->first('outcome') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.outcome_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="ringkasan">{{ trans('cruds.ruangctp.fields.ringkasan') }}</label>
                                <textarea class="form-control {{ $errors->has('ringkasan') ? 'is-invalid' : '' }}" name="ringkasan" id="ringkasan"
                                    required>{{ old('ringkasan') }}</textarea>
                                @if ($errors->has('ringkasan'))
                                    <span class="text-danger">{{ $errors->first('ringkasan') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.ringkasan_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="surat_permohonan">{{ trans('cruds.ruangctp.fields.surat_permohonan') }}</label>
                                <div class="needsclick dropzone {{ $errors->has('surat_permohonan') ? 'is-invalid' : '' }}"
                                    id="surat_permohonan-dropzone">
                                </div>
                                @if ($errors->has('surat_permohonan'))
                                    <span class="text-danger">{{ $errors->first('surat_permohonan') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.ruangctp.fields.surat_permohonan_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label>{{ trans('cruds.ruangctp.fields.rundown') }}</label>
                                @foreach (App\Models\Ruangctp::RUNDOWN_RADIO as $key => $label)
                                    <div class="form-check {{ $errors->has('rundown') ? 'is-invalid' : '' }}">
                                        <input class="form-check-input" type="radio" id="rundown_{{ $key }}"
                                            name="rundown" value="{{ $key }}"
                                            {{ old('rundown', 'Tidak') === (string) $key ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="rundown_{{ $key }}">{{ $label }}</label>
                                    </div>
                                @endforeach
                                @if ($errors->has('rundown'))
                                    <span class="text-danger">{{ $errors->first('rundown') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.rundown_helper') }}</span>
                            </div>
                            <div class="form-group" id="div-rundown" style="display: none;">
                                <label
                                    for="rundown_proposal">{{ trans('cruds.ruangctp.fields.rundown_proposal') }}</label>
                                <div class="needsclick dropzone {{ $errors->has('rundown_proposal') ? 'is-invalid' : '' }}"
                                    id="rundown_proposal-dropzone">
                                </div>
                                @if ($errors->has('rundown_proposal'))
                                    <span class="text-danger">{{ $errors->first('rundown_proposal') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.ruangctp.fields.rundown_proposal_helper') }}</span>
                            </div>
                            <div class="form-group" id="div-rundown-barang" style="display: none;">
                                <label for="rundown_barang">{{ trans('cruds.ruangctp.fields.rundown_barang') }}</label>
                                <div class="needsclick dropzone {{ $errors->has('rundown_barang') ? 'is-invalid' : '' }}"
                                    id="rundown_barang-dropzone">
                                </div>
                                @if ($errors->has('rundown_barang'))
                                    <span class="text-danger">{{ $errors->first('rundown_barang') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.ruangctp.fields.rundown_barang_helper') }}</span>
                            </div>
                            <div class="form-group" id="div-rundown-persiapan" style="display: none;">
                                <label
                                    for="rundown_persiapan">{{ trans('cruds.ruangctp.fields.rundown_persiapan') }}</label>
                                <div class="needsclick dropzone {{ $errors->has('rundown_persiapan') ? 'is-invalid' : '' }}"
                                    id="rundown_persiapan-dropzone">
                                </div>
                                @if ($errors->has('rundown_persiapan'))
                                    <span class="text-danger">{{ $errors->first('rundown_persiapan') }}</span>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.ruangctp.fields.rundown_persiapan_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label>{{ trans('cruds.ruangctp.fields.gladiresik') }}</label>
                                @foreach (App\Models\Ruangctp::GLADIRESIK_RADIO as $key => $label)
                                    <div class="form-check {{ $errors->has('gladiresik') ? 'is-invalid' : '' }}">
                                        <input class="form-check-input" type="radio"
                                            id="gladiresik_{{ $key }}" name="gladiresik"
                                            value="{{ $key }}"
                                            {{ old('gladiresik', '') === (string) $key ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="gladiresik_{{ $key }}">{{ $label }}</label>
                                    </div>
                                @endforeach
                                @if ($errors->has('gladiresik'))
                                    <span class="text-danger">{{ $errors->first('gladiresik') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.ruangctp.fields.gladiresik_helper') }}</span>
                            </div>
                            <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                            <button class="btn btn-success" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function hidebutton2() {
            var button1 = document.getElementById("valid2");
            var button2 = document.getElementById("next2");

            button1.style.display = "none";
            button2.removeAttribute("hidden");
        }
    </script>
    <script>
        function hidebutton() {
            var button1 = document.getElementById("valid");
            var button2 = document.getElementById("next");

            button1.style.display = "none";
            button2.removeAttribute("hidden");
        }
    </script>
    <script>
        function validateForm2() {
            // Menghapus pesan error sebelumnya
            clearErrors();

            // Memeriksa setiap input
            var instansi = document.getElementById('instansi').value;
            var statusdiinstansi = document.getElementById('statusdiinstansi').value;
            var bidanginstansi = document.getElementById('bidanginstansi').value;
            var alamatinstansi = document.getElementById('alamatinstansi').value;

            // Variabel untuk melacak apakah ada error yang ditemukan
            var hasError = false;

            // Memeriksa apakah setiap input memiliki nilai yang valid
            if (instansi === "") {
                displayError('instansi', 'Harap pilih instansi.');
                hasError = true;
            }
            if (statusdiinstansi === "") {
                displayError('statusdiinstansi', 'Harap pilih Status di Instansi.');
                hasError = true;
            }
            if (bidanginstansi === "") {
                displayError('bidanginstansi', 'Harap pilih Bidang instansi.');
                hasError = true;
            }
            if (alamatinstansi === "") {
                displayError('alamatinstansi', 'Harap pilih Alamat Instansi.');
                hasError = true;
            }
            // Mengembalikan false jika ada error yang ditemukan
            if (hasError) {
                return false;
            }
        }
        // Fungsi untuk menampilkan pesan error di bawah field
        function displayError(fieldName, errorMessage) {
            var errorElement = document.getElementById(fieldName + '-error');
            errorElement.innerHTML = errorMessage;
        }
        // Fungsi untuk menghapus pesan error sebelumnya
        function clearErrors() {
            var errorElements = document.getElementsByClassName('invalid-feedback');
            for (var i = 0; i < errorElements.length; i++) {
                errorElements[i].innerHTML = '';
            }
        }
    </script>
    <script>
        function validateForm() {
            // Menghapus pesan error sebelumnya
            clearErrors();

            // Memeriksa setiap input
            var ruangan = document.getElementById('ruangan_id').value;
            var skpd = document.getElementById('skpd').value;
            var bidangKegiatan = document.getElementById('bidang_kegiatan').value;
            var nama = document.getElementById('nama').value;
            var alamat = document.getElementById('alamat').value;
            var kelurahan = document.getElementById('kelurahan').value;
            var kecamatan = document.getElementById('kecamatan').value;
            var kota = document.getElementById('kota').value;
            var kodepos = document.getElementById('kodepos').value;
            var no = document.getElementById('no').value;
            var ktp = document.getElementById('ktp').value;

            // Variabel untuk melacak apakah ada error yang ditemukan
            var hasError = false;

            // Memeriksa apakah setiap input memiliki nilai yang valid
            if (ruangan === "") {
                displayError('ruangan', 'Harap pilih Ruangan.');
                hasError = true;
            }
            if (skpd === "") {
                displayError('skpd', 'Harap pilih SKPD.');
                hasError = true;
            }
            if (bidangKegiatan === "") {
                displayError('bidangKegiatan', 'Harap pilih Bidang Kegiatan.');
                hasError = true;
            }
            if (nama === "") {
                displayError('nama', 'Harap pilih Nama Pemohon.');
                hasError = true;
            }
            if (alamat === "") {
                displayError('alamat', 'Harap pilih Alamat.');
                hasError = true;
            }
            if (kelurahan === "") {
                displayError('kelurahan', 'Harap pilih Kelurahan.');
                hasError = true;
            }
            if (kecamatan === "") {
                displayError('kecamatan', 'Harap pilih Kecamatan.');
                hasError = true;
            }
            if (kota === "") {
                displayError('kota', 'Harap pilih kota.');
                hasError = true;
            }
            if (kodepos === "") {
                displayError('kodepos', 'Harap pilih Kode Pos.');
                hasError = true;
            }
            if (no === "") {
                displayError('no', 'Harap pilih Nomor HP.');
                hasError = true;
            }
            if (ktp === "") {
                displayError('ktp', 'Harap pilih No. KTP.');
                hasError = true;
            }
            // Mengembalikan false jika ada error yang ditemukan
            if (hasError) {
                return false;
            }
        }
        // Fungsi untuk menampilkan pesan error di bawah field
        function displayError(fieldName, errorMessage) {
            var errorElement = document.getElementById(fieldName + '-error');
            errorElement.innerHTML = errorMessage;
        }
        // Fungsi untuk menghapus pesan error sebelumnya
        function clearErrors() {
            var errorElements = document.getElementsByClassName('invalid-feedback');
            for (var i = 0; i < errorElements.length; i++) {
                errorElements[i].innerHTML = '';
            }
        }
    </script>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var rundownRadio = document.querySelectorAll('input[name="rundown"]');

            // Tambahkan event listener untuk setiap radio button
            for (var i = 0; i < rundownRadio.length; i++) {
                rundownRadio[i].addEventListener("change", function() {
                    if (this.value === "Ya") {
                        // Tampilkan div jika radio button "Ya" dipilih
                        document.getElementById("div-rundown").style.display = "block";
                        document.getElementById("div-rundown-barang").style.display = "block";
                        document.getElementById("div-rundown-persiapan").style.display = "block";
                    } else {
                        // Sembunyikan div jika radio button "Tidak" dipilih
                        document.getElementById("div-rundown").style.display = "none";
                        document.getElementById("div-rundown-barang").style.display = "none";
                        document.getElementById("div-rundown-persiapan").style.display = "none";
                    }
                });
            }
        });
    </script>
    <script>
        Dropzone.options.suratPermohonanDropzone = {
            url: '{{ route('admin.ruangctps.storeMedia') }}',
            maxFilesize: 5, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5
            },
            success: function(file, response) {
                $('form').find('input[name="surat_permohonan"]').remove()
                $('form').append('<input type="hidden" name="surat_permohonan" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="surat_permohonan"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($ruangctp) && $ruangctp->surat_permohonan)
                    var file = {!! json_encode($ruangctp->surat_permohonan) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="surat_permohonan" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
    <script>
        Dropzone.options.rundownProposalDropzone = {
            url: '{{ route('admin.ruangctps.storeMedia') }}',
            maxFilesize: 5, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5
            },
            success: function(file, response) {
                $('form').find('input[name="rundown_proposal"]').remove()
                $('form').append('<input type="hidden" name="rundown_proposal" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="rundown_proposal"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($ruangctp) && $ruangctp->rundown_proposal)
                    var file = {!! json_encode($ruangctp->rundown_proposal) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="rundown_proposal" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
    <script>
        Dropzone.options.rundownBarangDropzone = {
            url: '{{ route('admin.ruangctps.storeMedia') }}',
            maxFilesize: 5, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5
            },
            success: function(file, response) {
                $('form').find('input[name="rundown_barang"]').remove()
                $('form').append('<input type="hidden" name="rundown_barang" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="rundown_barang"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($ruangctp) && $ruangctp->rundown_barang)
                    var file = {!! json_encode($ruangctp->rundown_barang) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="rundown_barang" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
    <script>
        Dropzone.options.rundownPersiapanDropzone = {
            url: '{{ route('admin.ruangctps.storeMedia') }}',
            maxFilesize: 5, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5
            },
            success: function(file, response) {
                $('form').find('input[name="rundown_persiapan"]').remove()
                $('form').append('<input type="hidden" name="rundown_persiapan" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="rundown_persiapan"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($ruangctp) && $ruangctp->rundown_persiapan)
                    var file = {!! json_encode($ruangctp->rundown_persiapan) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="rundown_persiapan" value="' + file.file_name +
                        '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection
