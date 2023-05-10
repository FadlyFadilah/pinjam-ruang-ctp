@extends('layouts.user')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.peminjamanStudioDubbing.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('user.peminjaman-studio-dubbings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanStudioDubbing.fields.id') }}
                        </th>
                        <td>
                            {{ $peminjamanStudioDubbing->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanStudioDubbing.fields.nama') }}
                        </th>
                        <td>
                            {{ $peminjamanStudioDubbing->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanStudioDubbing.fields.ktp') }}
                        </th>
                        <td>
                            {{ $peminjamanStudioDubbing->ktp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanStudioDubbing.fields.alamat') }}
                        </th>
                        <td>
                            {{ $peminjamanStudioDubbing->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanStudioDubbing.fields.no_hp') }}
                        </th>
                        <td>
                            {{ $peminjamanStudioDubbing->no_hp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanStudioDubbing.fields.email') }}
                        </th>
                        <td>
                            {{ $peminjamanStudioDubbing->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanStudioDubbing.fields.booking') }}
                        </th>
                        <td>
                            {{ $peminjamanStudioDubbing->booking }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanStudioDubbing.fields.selesai_booking') }}
                        </th>
                        <td>
                            {{ $peminjamanStudioDubbing->selesai_booking }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanStudioDubbing.fields.operator') }}
                        </th>
                        <td>
                            {{ App\Models\PeminjamanStudioDubbing::OPERATOR_RADIO[$peminjamanStudioDubbing->operator] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.peminjamanStudioDubbing.fields.persetujuan') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $peminjamanStudioDubbing->persetujuan ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('user.peminjaman-studio-dubbings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection