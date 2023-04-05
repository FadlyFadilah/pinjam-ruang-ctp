@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.barang.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.barangs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.barang.fields.id') }}
                        </th>
                        <td>
                            {{ $barang->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barang.fields.nama_barang') }}
                        </th>
                        <td>
                            {{ $barang->nama_barang }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barang.fields.kapasitas') }}
                        </th>
                        <td>
                            {{ $barang->kapasitas }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barang.fields.lokasi') }}
                        </th>
                        <td>
                            {{ $barang->lokasi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barang.fields.deskripsi') }}
                        </th>
                        <td>
                            {{ $barang->deskripsi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barang.fields.status') }}
                        </th>
                        <td>
                            {{ $barang->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barang.fields.gambar') }}
                        </th>
                        <td>
                            @if($barang->gambar)
                                <a href="{{ $barang->gambar->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $barang->gambar->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.barangs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection