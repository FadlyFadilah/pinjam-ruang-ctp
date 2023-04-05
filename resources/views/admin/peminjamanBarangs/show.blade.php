@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.peminjamanBarang.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.peminjaman-barangs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanBarang.fields.id') }}
                        </th>
                        <td>
                            {{ $peminjamanBarang->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanBarang.fields.barang') }}
                        </th>
                        <td>
                            {{ $peminjamanBarang->barang->nama_barang ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanBarang.fields.nama_usaha') }}
                        </th>
                        <td>
                            {{ $peminjamanBarang->nama_usaha }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanBarang.fields.alamat') }}
                        </th>
                        <td>
                            {{ $peminjamanBarang->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanBarang.fields.name') }}
                        </th>
                        <td>
                            {{ $peminjamanBarang->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanBarang.fields.ktp') }}
                        </th>
                        <td>
                            {{ $peminjamanBarang->ktp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanBarang.fields.booking') }}
                        </th>
                        <td>
                            {{ $peminjamanBarang->booking }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanBarang.fields.tujuan') }}
                        </th>
                        <td>
                            {{ $peminjamanBarang->tujuan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanBarang.fields.no_hp') }}
                        </th>
                        <td>
                            {{ $peminjamanBarang->no_hp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanBarang.fields.email') }}
                        </th>
                        <td>
                            {{ $peminjamanBarang->email }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.peminjaman-barangs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection