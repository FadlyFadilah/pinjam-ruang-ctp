@extends('layouts.user')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.ruangctp.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('user.ruangctps.update', [$ruangctp->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="ruangan_id">{{ trans('cruds.ruangctp.fields.ruangan') }}</label>
                    <select class="form-control select2 {{ $errors->has('ruangan') ? 'is-invalid' : '' }}" name="ruangan_id"
                        id="ruangan_id" required>
                        @foreach ($ruangans as $id => $entry)
                            <option value="{{ $id }}"
                                {{ (old('ruangan_id') ? old('ruangan_id') : $ruangctp->ruangan->id ?? '') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
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
                                {{ old('skpd', $ruangctp->skpd) === (string) $key ? 'selected' : '' }}>{{ $label }}
                            </option>
                        @endforeach
                    </select>
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
                                {{ old('bidang_kegiatan', $ruangctp->bidang_kegiatan) === (string) $key ? 'selected' : '' }}>
                                {{ $label }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('bidang_kegiatan'))
                        <span class="text-danger">{{ $errors->first('bidang_kegiatan') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.bidang_kegiatan_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="nama">{{ trans('cruds.ruangctp.fields.nama') }}</label>
                    <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text"
                        name="nama" id="nama" value="{{ old('nama', $ruangctp->nama) }}" required>
                    @if ($errors->has('nama'))
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.nama_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="alamat">{{ trans('cruds.ruangctp.fields.alamat') }}</label>
                    <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat" required>{{ old('alamat', $ruangctp->alamat) }}</textarea>
                    @if ($errors->has('alamat'))
                        <span class="text-danger">{{ $errors->first('alamat') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.alamat_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="kelurahan">{{ trans('cruds.ruangctp.fields.kelurahan') }}</label>
                    <input class="form-control {{ $errors->has('kelurahan') ? 'is-invalid' : '' }}" type="text"
                        name="kelurahan" id="kelurahan" value="{{ old('kelurahan', $ruangctp->kelurahan) }}" required>
                    @if ($errors->has('kelurahan'))
                        <span class="text-danger">{{ $errors->first('kelurahan') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.kelurahan_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="kecamatan">{{ trans('cruds.ruangctp.fields.kecamatan') }}</label>
                    <input class="form-control {{ $errors->has('kecamatan') ? 'is-invalid' : '' }}" type="text"
                        name="kecamatan" id="kecamatan" value="{{ old('kecamatan', $ruangctp->kecamatan) }}" required>
                    @if ($errors->has('kecamatan'))
                        <span class="text-danger">{{ $errors->first('kecamatan') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.kecamatan_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="kota">{{ trans('cruds.ruangctp.fields.kota') }}</label>
                    <input class="form-control {{ $errors->has('kota') ? 'is-invalid' : '' }}" type="text"
                        name="kota" id="kota" value="{{ old('kota', $ruangctp->kota) }}" required>
                    @if ($errors->has('kota'))
                        <span class="text-danger">{{ $errors->first('kota') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.kota_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="kodepos">{{ trans('cruds.ruangctp.fields.kodepos') }}</label>
                    <input class="form-control {{ $errors->has('kodepos') ? 'is-invalid' : '' }}" type="text"
                        name="kodepos" id="kodepos" value="{{ old('kodepos', $ruangctp->kodepos) }}" required>
                    @if ($errors->has('kodepos'))
                        <span class="text-danger">{{ $errors->first('kodepos') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.kodepos_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="no">{{ trans('cruds.ruangctp.fields.no') }}</label>
                    <input class="form-control {{ $errors->has('no') ? 'is-invalid' : '' }}" type="text" name="no"
                        id="no" value="{{ old('no', $ruangctp->no) }}" required>
                    @if ($errors->has('no'))
                        <span class="text-danger">{{ $errors->first('no') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.no_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="ktp">{{ trans('cruds.ruangctp.fields.ktp') }}</label>
                    <input class="form-control {{ $errors->has('ktp') ? 'is-invalid' : '' }}" type="text"
                        name="ktp" id="ktp" value="{{ old('ktp', $ruangctp->ktp) }}" required>
                    @if ($errors->has('ktp'))
                        <span class="text-danger">{{ $errors->first('ktp') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.ktp_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="instansi">{{ trans('cruds.ruangctp.fields.instansi') }}</label>
                    <input class="form-control {{ $errors->has('instansi') ? 'is-invalid' : '' }}" type="text"
                        name="instansi" id="instansi" value="{{ old('instansi', $ruangctp->instansi) }}" required>
                    @if ($errors->has('instansi'))
                        <span class="text-danger">{{ $errors->first('instansi') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.instansi_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="statusdiinstansi">{{ trans('cruds.ruangctp.fields.statusdiinstansi') }}</label>
                    <input class="form-control {{ $errors->has('statusdiinstansi') ? 'is-invalid' : '' }}" type="text"
                        name="statusdiinstansi" id="statusdiinstansi"
                        value="{{ old('statusdiinstansi', $ruangctp->statusdiinstansi) }}">
                    @if ($errors->has('statusdiinstansi'))
                        <span class="text-danger">{{ $errors->first('statusdiinstansi') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.statusdiinstansi_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required"
                        for="bidanginstansi">{{ trans('cruds.ruangctp.fields.bidanginstansi') }}</label>
                    <input class="form-control {{ $errors->has('bidanginstansi') ? 'is-invalid' : '' }}" type="text"
                        name="bidanginstansi" id="bidanginstansi"
                        value="{{ old('bidanginstansi', $ruangctp->bidanginstansi) }}" required>
                    @if ($errors->has('bidanginstansi'))
                        <span class="text-danger">{{ $errors->first('bidanginstansi') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.bidanginstansi_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="alamatinstansi">{{ trans('cruds.ruangctp.fields.alamatinstansi') }}</label>
                    <textarea class="form-control {{ $errors->has('alamatinstansi') ? 'is-invalid' : '' }}" name="alamatinstansi"
                        id="alamatinstansi">{{ old('alamatinstansi', $ruangctp->alamatinstansi) }}</textarea>
                    @if ($errors->has('alamatinstansi'))
                        <span class="text-danger">{{ $errors->first('alamatinstansi') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.alamatinstansi_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="mulai">{{ trans('cruds.ruangctp.fields.mulai') }}</label>
                    <input class="form-control {{ $errors->has('mulai') ? 'is-invalid' : '' }}" type="text"
                        name="mulai" id="mulai" value="{{ old('mulai', $ruangctp->mulai) }}" required>
                    @if ($errors->has('mulai'))
                        <span class="text-danger">{{ $errors->first('mulai') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.mulai_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="mulaijam">{{ trans('cruds.ruangctp.fields.mulaijam') }}</label>
                    <input class="form-control timepicker {{ $errors->has('mulaijam') ? 'is-invalid' : '' }}"
                        type="text" name="mulaijam" id="mulaijam"
                        value="{{ old('mulaijam', $ruangctp->mulaijam) }}" required>
                    @if ($errors->has('mulaijam'))
                        <span class="text-danger">{{ $errors->first('mulaijam') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.mulaijam_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="selesai">{{ trans('cruds.ruangctp.fields.selesai') }}</label>
                    <input class="form-control {{ $errors->has('selesai') ? 'is-invalid' : '' }}" type="text"
                        name="selesai" id="selesai" value="{{ old('selesai', $ruangctp->selesai) }}" required>
                    @if ($errors->has('selesai'))
                        <span class="text-danger">{{ $errors->first('selesai') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.selesai_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="selesaijam">{{ trans('cruds.ruangctp.fields.selesaijam') }}</label>
                    <input class="form-control timepicker {{ $errors->has('selesaijam') ? 'is-invalid' : '' }}"
                        type="text" name="selesaijam" id="selesaijam"
                        value="{{ old('selesaijam', $ruangctp->selesaijam) }}" required>
                    @if ($errors->has('selesaijam'))
                        <span class="text-danger">{{ $errors->first('selesaijam') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.selesaijam_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="nama_acara">{{ trans('cruds.ruangctp.fields.nama_acara') }}</label>
                    <input class="form-control {{ $errors->has('nama_acara') ? 'is-invalid' : '' }}" type="text"
                        name="nama_acara" id="nama_acara" value="{{ old('nama_acara', $ruangctp->nama_acara) }}"
                        required>
                    @if ($errors->has('nama_acara'))
                        <span class="text-danger">{{ $errors->first('nama_acara') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.nama_acara_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required"
                        for="jumlah_peserta">{{ trans('cruds.ruangctp.fields.jumlah_peserta') }}</label>
                    <input class="form-control {{ $errors->has('jumlah_peserta') ? 'is-invalid' : '' }}" type="text"
                        name="jumlah_peserta" id="jumlah_peserta"
                        value="{{ old('jumlah_peserta', $ruangctp->jumlah_peserta) }}" required>
                    @if ($errors->has('jumlah_peserta'))
                        <span class="text-danger">{{ $errors->first('jumlah_peserta') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.jumlah_peserta_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="narasumber">{{ trans('cruds.ruangctp.fields.narasumber') }}</label>
                    <input class="form-control {{ $errors->has('narasumber') ? 'is-invalid' : '' }}" type="text"
                        name="narasumber" id="narasumber" value="{{ old('narasumber', $ruangctp->narasumber) }}"
                        required>
                    @if ($errors->has('narasumber'))
                        <span class="text-danger">{{ $errors->first('narasumber') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.narasumber_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="outpu">{{ trans('cruds.ruangctp.fields.outpu') }}</label>
                    <input class="form-control {{ $errors->has('outpu') ? 'is-invalid' : '' }}" type="text"
                        name="outpu" id="outpu" value="{{ old('outpu', $ruangctp->outpu) }}">
                    @if ($errors->has('outpu'))
                        <span class="text-danger">{{ $errors->first('outpu') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.outpu_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="outcome">{{ trans('cruds.ruangctp.fields.outcome') }}</label>
                    <input class="form-control {{ $errors->has('outcome') ? 'is-invalid' : '' }}" type="text"
                        name="outcome" id="outcome" value="{{ old('outcome', $ruangctp->outcome) }}">
                    @if ($errors->has('outcome'))
                        <span class="text-danger">{{ $errors->first('outcome') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.outcome_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="ringkasan">{{ trans('cruds.ruangctp.fields.ringkasan') }}</label>
                    <textarea class="form-control {{ $errors->has('ringkasan') ? 'is-invalid' : '' }}" name="ringkasan" id="ringkasan"
                        required>{{ old('ringkasan', $ruangctp->ringkasan) }}</textarea>
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
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.surat_permohonan_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.ruangctp.fields.rundown') }}</label>
                    @foreach (App\Models\Ruangctp::RUNDOWN_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('rundown') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="rundown_{{ $key }}"
                                name="rundown" value="{{ $key }}"
                                {{ old('rundown', $ruangctp->rundown) === (string) $key ? 'checked' : '' }}>
                            <label class="form-check-label"
                                for="rundown_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if ($errors->has('rundown'))
                        <span class="text-danger">{{ $errors->first('rundown') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.rundown_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="rundown_proposal">{{ trans('cruds.ruangctp.fields.rundown_proposal') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('rundown_proposal') ? 'is-invalid' : '' }}"
                        id="rundown_proposal-dropzone">
                    </div>
                    @if ($errors->has('rundown_proposal'))
                        <span class="text-danger">{{ $errors->first('rundown_proposal') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.rundown_proposal_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="rundown_barang">{{ trans('cruds.ruangctp.fields.rundown_barang') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('rundown_barang') ? 'is-invalid' : '' }}"
                        id="rundown_barang-dropzone">
                    </div>
                    @if ($errors->has('rundown_barang'))
                        <span class="text-danger">{{ $errors->first('rundown_barang') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.rundown_barang_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="rundown_persiapan">{{ trans('cruds.ruangctp.fields.rundown_persiapan') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('rundown_persiapan') ? 'is-invalid' : '' }}"
                        id="rundown_persiapan-dropzone">
                    </div>
                    @if ($errors->has('rundown_persiapan'))
                        <span class="text-danger">{{ $errors->first('rundown_persiapan') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.rundown_persiapan_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.ruangctp.fields.gladiresik') }}</label>
                    @foreach (App\Models\Ruangctp::GLADIRESIK_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('gladiresik') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="gladiresik_{{ $key }}"
                                name="gladiresik" value="{{ $key }}"
                                {{ old('gladiresik', $ruangctp->gladiresik) === (string) $key ? 'checked' : '' }}>
                            <label class="form-check-label"
                                for="gladiresik_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if ($errors->has('gladiresik'))
                        <span class="text-danger">{{ $errors->first('gladiresik') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.ruangctp.fields.gladiresik_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Mendapatkan data hari libur Indonesia dari endpoint /holidays
            $.ajax({
                url: '/user/holidays',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var hariLibur = data;

                    // Menginisialisasi Single Datepicker
                    $('#selesai').daterangepicker({
                        singleDatePicker: true, // Mengaktifkan mode Single Datepicker
                        minDate: moment().add(2,
                            'weeks'), // Mengatur tanggal minimum dua minggu ke depan
                        isInvalidDate: function(date) {
                            // Menonaktifkan hari akhir pekan (Sabtu dan Minggu)
                            if (date.day() === 0 || date.day() === 6) {
                                return true;
                            }

                            // Memeriksa apakah tanggal adalah hari libur
                            var formattedDate = date.format('YYYY-MM-DD');
                            return hariLibur.includes(formattedDate);
                        },
                        locale: {
                            format: 'YYYY-MM-DD' // Format tampilan tanggal (m-d-Y)
                        }
                    });

                    // Mendengarkan perubahan tanggal pada Datepicker
                    $('#selesai').on('apply.daterangepicker', function(ev, picker) {
                        var selectedDate = picker.startDate;

                        // Memeriksa apakah tanggal yang dipilih valid
                        if (selectedDate.isSameOrBefore(moment().startOf('day'))) {
                            // Menampilkan pesan kesalahan jika tanggal tidak valid
                            alert('Tanggal yang dipilih harus setelah hari ini.');

                            // Mengembalikan ke tanggal sebelumnya yang valid
                            $(this).data('daterangepicker').setStartDate(moment().add(1,
                                'days'));
                        }
                    });
                },
                error: function() {
                    console.log('Gagal mendapatkan data hari libur.');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Mendapatkan data hari libur Indonesia dari endpoint /holidays
            $.ajax({
                url: '/user/holidays',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var hariLibur = data;

                    // Menginisialisasi Single Datepicker
                    $('#mulai').daterangepicker({
                        singleDatePicker: true, // Mengaktifkan mode Single Datepicker
                        minDate: moment().add(2,
                            'weeks'), // Mengatur tanggal minimum dua minggu ke depan
                        isInvalidDate: function(date) {
                            // Menonaktifkan hari akhir pekan (Sabtu dan Minggu)
                            if (date.day() === 0 || date.day() === 6) {
                                return true;
                            }

                            // Memeriksa apakah tanggal adalah hari libur
                            var formattedDate = date.format('YYYY-MM-DD');
                            return hariLibur.includes(formattedDate);
                        },
                        locale: {
                            format: 'YYYY-MM-DD' // Format tampilan tanggal (m-d-Y)
                        }
                    });

                    // Mendengarkan perubahan tanggal pada Datepicker
                    $('#mulai').on('apply.daterangepicker', function(ev, picker) {
                        var selectedDate = picker.startDate;

                        // Memeriksa apakah tanggal yang dipilih valid
                        if (selectedDate.isSameOrBefore(moment().startOf('day'))) {
                            // Menampilkan pesan kesalahan jika tanggal tidak valid
                            alert('Tanggal yang dipilih harus setelah hari ini.');

                            // Mengembalikan ke tanggal sebelumnya yang valid
                            $(this).data('daterangepicker').setStartDate(moment().add(1,
                                'days'));
                        }
                    });
                },
                error: function() {
                    console.log('Gagal mendapatkan data hari libur.');
                }
            });
        });
    </script>
    <script>
        Dropzone.options.suratPermohonanDropzone = {
            url: '{{ route('user.ruangctps.storeMedia') }}',
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
            url: '{{ route('user.ruangctps.storeMedia') }}',
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
            url: '{{ route('user.ruangctps.storeMedia') }}',
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
            url: '{{ route('user.ruangctps.storeMedia') }}',
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
