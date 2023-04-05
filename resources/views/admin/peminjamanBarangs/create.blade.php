@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.peminjamanBarang.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.peminjaman-barangs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="barang_id">{{ trans('cruds.peminjamanBarang.fields.barang') }}</label>
                <select class="form-control select2 {{ $errors->has('barang') ? 'is-invalid' : '' }}" name="barang_id" id="barang_id" required>
                    @foreach($barangs as $id => $entry)
                        <option value="{{ $id }}" {{ old('barang_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('barang'))
                    <span class="text-danger">{{ $errors->first('barang') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanBarang.fields.barang_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama_usaha">{{ trans('cruds.peminjamanBarang.fields.nama_usaha') }}</label>
                <input class="form-control {{ $errors->has('nama_usaha') ? 'is-invalid' : '' }}" type="text" name="nama_usaha" id="nama_usaha" value="{{ old('nama_usaha', '') }}" required>
                @if($errors->has('nama_usaha'))
                    <span class="text-danger">{{ $errors->first('nama_usaha') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanBarang.fields.nama_usaha_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alamat">{{ trans('cruds.peminjamanBarang.fields.alamat') }}</label>
                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat">{{ old('alamat') }}</textarea>
                @if($errors->has('alamat'))
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanBarang.fields.alamat_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.peminjamanBarang.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanBarang.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ktp">{{ trans('cruds.peminjamanBarang.fields.ktp') }}</label>
                <input class="form-control {{ $errors->has('ktp') ? 'is-invalid' : '' }}" type="text" name="ktp" id="ktp" value="{{ old('ktp', '') }}" required>
                @if($errors->has('ktp'))
                    <span class="text-danger">{{ $errors->first('ktp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanBarang.fields.ktp_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="booking">{{ trans('cruds.peminjamanBarang.fields.booking') }}</label>
                <input class="form-control date {{ $errors->has('booking') ? 'is-invalid' : '' }}" type="text" name="booking" id="booking" value="{{ old('booking') }}" required>
                @if($errors->has('booking'))
                    <span class="text-danger">{{ $errors->first('booking') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanBarang.fields.booking_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tujuan">{{ trans('cruds.peminjamanBarang.fields.tujuan') }}</label>
                <input class="form-control {{ $errors->has('tujuan') ? 'is-invalid' : '' }}" type="text" name="tujuan" id="tujuan" value="{{ old('tujuan', '') }}" required>
                @if($errors->has('tujuan'))
                    <span class="text-danger">{{ $errors->first('tujuan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanBarang.fields.tujuan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="no_hp">{{ trans('cruds.peminjamanBarang.fields.no_hp') }}</label>
                <input class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', '') }}" required>
                @if($errors->has('no_hp'))
                    <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanBarang.fields.no_hp_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.peminjamanBarang.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.peminjamanBarang.fields.email_helper') }}</span>
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