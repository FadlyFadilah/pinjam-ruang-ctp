@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.peminjamanCh.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.peminjaman-ches.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.id') }}
                        </th>
                        <td>
                            {{ $peminjamanCh->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.ruangan') }}
                        </th>
                        <td>
                            {{ $peminjamanCh->ruangan->nama_ruangan ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.nama') }}
                        </th>
                        <td>
                            {{ $peminjamanCh->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.ktp') }}
                        </th>
                        <td>
                            {{ $peminjamanCh->ktp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.alamat') }}
                        </th>
                        <td>
                            {{ $peminjamanCh->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.no_hp') }}
                        </th>
                        <td>
                            {{ $peminjamanCh->no_hp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.email') }}
                        </th>
                        <td>
                            {{ $peminjamanCh->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.tujuan') }}
                        </th>
                        <td>
                            {{ $peminjamanCh->tujuan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.booking') }}
                        </th>
                        <td>
                            {{ $peminjamanCh->booking }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.selesai') }}
                        </th>
                        <td>
                            {{ $peminjamanCh->selesai }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.jumlah') }}
                        </th>
                        <td>
                            {{ $peminjamanCh->jumlah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.infokus') }}
                        </th>
                        <td>
                            {{ App\Models\PeminjamanCh::INFOKUS_RADIO[$peminjamanCh->infokus] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.persetujuan') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $peminjamanCh->persetujuan ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.persetujuan_2') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $peminjamanCh->persetujuan_2 ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.peminjaman-ches.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection