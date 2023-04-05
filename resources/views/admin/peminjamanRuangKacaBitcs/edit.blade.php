@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.peminjamanRuangKacaBitc.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.peminjaman-ruang-kaca-bitcs.update", [$peminjamanRuangKacaBitc->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="ruangan_id">{{ trans('cruds.peminjamanRuangKacaBitc.fields.ruangan') }}</label>
                <select class="form-control select2 {{ $errors->has('ruangan') ? 'is-invalid' : '' }}" name="ruangan_id" id="ruangan_id">
                    @foreach($ruangans as $id => $entry)
                        <option value="{{ $id }}" {{ (old('ruangan_id') ? old('ruangan_id') : $peminjamanRuangKacaBitc->ruangan->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ruangan'))
                    <span class="text-danger">{{ $errors->first('ruangan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanRuangKacaBitc.fields.ruangan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.peminjamanRuangKacaBitc.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', $peminjamanRuangKacaBitc->nama) }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanRuangKacaBitc.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ktp">{{ trans('cruds.peminjamanRuangKacaBitc.fields.ktp') }}</label>
                <input class="form-control {{ $errors->has('ktp') ? 'is-invalid' : '' }}" type="text" name="ktp" id="ktp" value="{{ old('ktp', $peminjamanRuangKacaBitc->ktp) }}" required>
                @if($errors->has('ktp'))
                    <span class="text-danger">{{ $errors->first('ktp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanRuangKacaBitc.fields.ktp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alamat">{{ trans('cruds.peminjamanRuangKacaBitc.fields.alamat') }}</label>
                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat">{{ old('alamat', $peminjamanRuangKacaBitc->alamat) }}</textarea>
                @if($errors->has('alamat'))
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanRuangKacaBitc.fields.alamat_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="no_hp">{{ trans('cruds.peminjamanRuangKacaBitc.fields.no_hp') }}</label>
                <input class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', $peminjamanRuangKacaBitc->no_hp) }}" required>
                @if($errors->has('no_hp'))
                    <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanRuangKacaBitc.fields.no_hp_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.peminjamanRuangKacaBitc.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $peminjamanRuangKacaBitc->email) }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanRuangKacaBitc.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tanggal_booking">{{ trans('cruds.peminjamanRuangKacaBitc.fields.tanggal_booking') }}</label>
                <input class="form-control date {{ $errors->has('tanggal_booking') ? 'is-invalid' : '' }}" type="text" name="tanggal_booking" id="tanggal_booking" value="{{ old('tanggal_booking', $peminjamanRuangKacaBitc->tanggal_booking) }}" required>
                @if($errors->has('tanggal_booking'))
                    <span class="text-danger">{{ $errors->first('tanggal_booking') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanRuangKacaBitc.fields.tanggal_booking_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="selesai_booking">{{ trans('cruds.peminjamanRuangKacaBitc.fields.selesai_booking') }}</label>
                <input class="form-control date {{ $errors->has('selesai_booking') ? 'is-invalid' : '' }}" type="text" name="selesai_booking" id="selesai_booking" value="{{ old('selesai_booking', $peminjamanRuangKacaBitc->selesai_booking) }}">
                @if($errors->has('selesai_booking'))
                    <span class="text-danger">{{ $errors->first('selesai_booking') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanRuangKacaBitc.fields.selesai_booking_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jumlah">{{ trans('cruds.peminjamanRuangKacaBitc.fields.jumlah') }}</label>
                <input class="form-control {{ $errors->has('jumlah') ? 'is-invalid' : '' }}" type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', $peminjamanRuangKacaBitc->jumlah) }}" step="1" required>
                @if($errors->has('jumlah'))
                    <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanRuangKacaBitc.fields.jumlah_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.peminjamanRuangKacaBitc.fields.infokus') }}</label>
                @foreach(App\Models\PeminjamanRuangKacaBitc::INFOKUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('infokus') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="infokus_{{ $key }}" name="infokus" value="{{ $key }}" {{ old('infokus', $peminjamanRuangKacaBitc->infokus) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="infokus_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('infokus'))
                    <span class="text-danger">{{ $errors->first('infokus') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanRuangKacaBitc.fields.infokus_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('aggrement') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="aggrement" id="aggrement" value="1" {{ $peminjamanRuangKacaBitc->aggrement || old('aggrement', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="aggrement">{{ trans('cruds.peminjamanRuangKacaBitc.fields.aggrement') }}</label>
                </div>
                @if($errors->has('aggrement'))
                    <span class="text-danger">{{ $errors->first('aggrement') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanRuangKacaBitc.fields.aggrement_helper') }}</span>
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