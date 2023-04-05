@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.peminjamanStudioDubbing.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.peminjaman-studio-dubbings.update", [$peminjamanStudioDubbing->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.peminjamanStudioDubbing.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', $peminjamanStudioDubbing->nama) }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanStudioDubbing.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ktp">{{ trans('cruds.peminjamanStudioDubbing.fields.ktp') }}</label>
                <input class="form-control {{ $errors->has('ktp') ? 'is-invalid' : '' }}" type="text" name="ktp" id="ktp" value="{{ old('ktp', $peminjamanStudioDubbing->ktp) }}" required>
                @if($errors->has('ktp'))
                    <span class="text-danger">{{ $errors->first('ktp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanStudioDubbing.fields.ktp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alamat">{{ trans('cruds.peminjamanStudioDubbing.fields.alamat') }}</label>
                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat">{{ old('alamat', $peminjamanStudioDubbing->alamat) }}</textarea>
                @if($errors->has('alamat'))
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanStudioDubbing.fields.alamat_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="no_hp">{{ trans('cruds.peminjamanStudioDubbing.fields.no_hp') }}</label>
                <input class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', $peminjamanStudioDubbing->no_hp) }}" required>
                @if($errors->has('no_hp'))
                    <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanStudioDubbing.fields.no_hp_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.peminjamanStudioDubbing.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $peminjamanStudioDubbing->email) }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanStudioDubbing.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="booking">{{ trans('cruds.peminjamanStudioDubbing.fields.booking') }}</label>
                <input class="form-control date {{ $errors->has('booking') ? 'is-invalid' : '' }}" type="text" name="booking" id="booking" value="{{ old('booking', $peminjamanStudioDubbing->booking) }}" required>
                @if($errors->has('booking'))
                    <span class="text-danger">{{ $errors->first('booking') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanStudioDubbing.fields.booking_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="selesai_booking">{{ trans('cruds.peminjamanStudioDubbing.fields.selesai_booking') }}</label>
                <input class="form-control date {{ $errors->has('selesai_booking') ? 'is-invalid' : '' }}" type="text" name="selesai_booking" id="selesai_booking" value="{{ old('selesai_booking', $peminjamanStudioDubbing->selesai_booking) }}">
                @if($errors->has('selesai_booking'))
                    <span class="text-danger">{{ $errors->first('selesai_booking') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanStudioDubbing.fields.selesai_booking_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.peminjamanStudioDubbing.fields.operator') }}</label>
                @foreach(App\Models\PeminjamanStudioDubbing::OPERATOR_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('operator') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="operator_{{ $key }}" name="operator" value="{{ $key }}" {{ old('operator', $peminjamanStudioDubbing->operator) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="operator_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('operator'))
                    <span class="text-danger">{{ $errors->first('operator') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanStudioDubbing.fields.operator_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('persetujuan') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="persetujuan" id="persetujuan" value="1" {{ $peminjamanStudioDubbing->persetujuan || old('persetujuan', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="persetujuan">{{ trans('cruds.peminjamanStudioDubbing.fields.persetujuan') }}</label>
                </div>
                @if($errors->has('persetujuan'))
                    <span class="text-danger">{{ $errors->first('persetujuan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanStudioDubbing.fields.persetujuan_helper') }}</span>
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