@extends('layouts.user')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.peminjamanCh.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('user.peminjaman-ches.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="nama">{{ trans('cruds.peminjamanCh.fields.nama') }}</label>
                    <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama"
                        id="nama" value="{{ old('nama', '') }}" required>
                    @if ($errors->has('nama'))
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.peminjamanCh.fields.nama_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="ktp">{{ trans('cruds.peminjamanCh.fields.ktp') }}</label>
                    <input class="form-control {{ $errors->has('ktp') ? 'is-invalid' : '' }}" type="text" name="ktp"
                        id="ktp" value="{{ old('ktp', '') }}" required>
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
                    <label class="required" for="no_hp">{{ trans('cruds.peminjamanCh.fields.no_hp') }}</label>
                    <input class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" type="text"
                        name="no_hp" id="no_hp" value="{{ old('no_hp', '') }}" required>
                    @if ($errors->has('no_hp'))
                        <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.peminjamanCh.fields.no_hp_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="email">{{ trans('cruds.peminjamanCh.fields.email') }}</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                        name="email" id="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.peminjamanCh.fields.email_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="tujuan">{{ trans('cruds.peminjamanCh.fields.tujuan') }}</label>
                    <input class="form-control {{ $errors->has('tujuan') ? 'is-invalid' : '' }}" type="text"
                        name="tujuan" id="tujuan" value="{{ old('tujuan', '') }}" required>
                    @if ($errors->has('tujuan'))
                        <span class="text-danger">{{ $errors->first('tujuan') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.peminjamanCh.fields.tujuan_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="booking">{{ trans('cruds.peminjamanCh.fields.booking') }}</label>
                    <input class="form-control date {{ $errors->has('booking') ? 'is-invalid' : '' }}" type="text"
                        name="booking" id="booking" value="{{ old('booking') }}" required>
                    @if ($errors->has('booking'))
                        <span class="text-danger">{{ $errors->first('booking') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.peminjamanCh.fields.booking_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="selesai">{{ trans('cruds.peminjamanCh.fields.selesai') }}</label>
                    <input class="form-control date {{ $errors->has('selesai') ? 'is-invalid' : '' }}" type="text"
                        name="selesai" id="selesai" value="{{ old('selesai') }}">
                    @if ($errors->has('selesai'))
                        <span class="text-danger">{{ $errors->first('selesai') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.peminjamanCh.fields.selesai_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="jumlah">{{ trans('cruds.peminjamanCh.fields.jumlah') }}</label>
                    <input class="form-control {{ $errors->has('jumlah') ? 'is-invalid' : '' }}" type="number"
                        name="jumlah" id="jumlah" value="{{ old('jumlah', '') }}" step="1" required>
                    @if ($errors->has('jumlah'))
                        <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.peminjamanCh.fields.jumlah_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.peminjamanCh.fields.infokus') }}</label>
                    @foreach (App\Models\PeminjamanCh::INFOKUS_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('infokus') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="infokus_{{ $key }}" name="infokus"
                                value="{{ $key }}" {{ old('infokus', '') === (string) $key ? 'checked' : '' }}>
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
                    <span class="help-block">{{ trans('cruds.peminjamanCh.fields.persetujuan_helper') }}</span>
                </div>
                <div class="form-group">
                    <div class="form-check {{ $errors->has('persetujuan_2') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="checkbox" name="persetujuan_2" id="persetujuan_2"
                            value="1" required {{ old('persetujuan_2', 0) == 1 ? 'checked' : '' }}>
                        <label class="required form-check-label"
                            for="persetujuan_2">{{ trans('cruds.peminjamanCh.fields.persetujuan_2') }}</label>
                    </div>
                    @if ($errors->has('persetujuan_2'))
                        <span class="text-danger">{{ $errors->first('persetujuan_2') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.peminjamanCh.fields.persetujuan_2_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
        <a href="https://api.whatsapp.com/send?phone=085163587878"
            class="float" target="_blank">
            <i class="fa fa-whatsapp my-float"></i>
        </a>
    </div>
@endsection
