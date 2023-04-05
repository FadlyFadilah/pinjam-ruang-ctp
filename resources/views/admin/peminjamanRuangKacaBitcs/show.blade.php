@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.peminjamanRuangKacaBitc.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.peminjaman-ruang-kaca-bitcs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanRuangKacaBitc.fields.id') }}
                        </th>
                        <td>
                            {{ $peminjamanRuangKacaBitc->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanRuangKacaBitc.fields.ruangan') }}
                        </th>
                        <td>
                            {{ $peminjamanRuangKacaBitc->ruangan->nama_ruangan ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanRuangKacaBitc.fields.nama') }}
                        </th>
                        <td>
                            {{ $peminjamanRuangKacaBitc->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanRuangKacaBitc.fields.ktp') }}
                        </th>
                        <td>
                            {{ $peminjamanRuangKacaBitc->ktp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanRuangKacaBitc.fields.alamat') }}
                        </th>
                        <td>
                            {{ $peminjamanRuangKacaBitc->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanRuangKacaBitc.fields.no_hp') }}
                        </th>
                        <td>
                            {{ $peminjamanRuangKacaBitc->no_hp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanRuangKacaBitc.fields.email') }}
                        </th>
                        <td>
                            {{ $peminjamanRuangKacaBitc->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanRuangKacaBitc.fields.tanggal_booking') }}
                        </th>
                        <td>
                            {{ $peminjamanRuangKacaBitc->tanggal_booking }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanRuangKacaBitc.fields.selesai_booking') }}
                        </th>
                        <td>
                            {{ $peminjamanRuangKacaBitc->selesai_booking }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanRuangKacaBitc.fields.jumlah') }}
                        </th>
                        <td>
                            {{ $peminjamanRuangKacaBitc->jumlah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanRuangKacaBitc.fields.infokus') }}
                        </th>
                        <td>
                            {{ App\Models\PeminjamanRuangKacaBitc::INFOKUS_RADIO[$peminjamanRuangKacaBitc->infokus] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanRuangKacaBitc.fields.aggrement') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $peminjamanRuangKacaBitc->aggrement ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.peminjaman-ruang-kaca-bitcs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection