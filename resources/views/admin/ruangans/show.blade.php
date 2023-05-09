@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.ruangan.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.ruangans.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.ruangan.fields.id') }}
                            </th>
                            <td>
                                {{ $ruangan->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ruangan.fields.nama_ruangan') }}
                            </th>
                            <td>
                                {{ $ruangan->nama_ruangan }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ruangan.fields.kapasitas') }}
                            </th>
                            <td>
                                {{ $ruangan->kapasitas }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ruangan.fields.lokasi') }}
                            </th>
                            <td>
                                {{ $ruangan->lokasi }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ruangan.fields.deskripsi') }}
                            </th>
                            <td>
                                {{ $ruangan->deskripsi }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ruangan.fields.status') }}
                            </th>
                            <td>
                                {{ App\Models\Ruangan::STATUS_SELECT[$ruangan->status] ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ruangan.fields.gambar') }}
                            </th>
                            <td>
                                @if ($ruangan->gambar)
                                    <a href="{{ $ruangan->gambar->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $ruangan->gambar->getUrl() }}" width="50" height="50">
                                    </a>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.ruangans.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
