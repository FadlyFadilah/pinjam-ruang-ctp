@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.kp.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.kp.fields.id') }}
                        </th>
                        <td>
                            {{ $kp->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kp.fields.nama') }}
                        </th>
                        <td>
                            {{ $kp->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kp.fields.univ') }}
                        </th>
                        <td>
                            {{ $kp->univ }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kp.fields.no_hp') }}
                        </th>
                        <td>
                            {{ $kp->no_hp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kp.fields.email') }}
                        </th>
                        <td>
                            {{ $kp->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kp.fields.alamat') }}
                        </th>
                        <td>
                            {{ $kp->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Dari Tanggal
                        </th>
                        <td>
                            {{ $kp->lama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Sampai Tanggal
                        </th>
                        <td>
                            {{ $kp->sampai }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kp.fields.kesbang') }}
                        </th>
                        <td>
                            @if($kp->kesbang)
                                <a href="{{ $kp->kesbang->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kp.fields.hasil') }}
                        </th>
                        <td>
                            @if($kp->hasil)
                                <a href="{{ $kp->hasil->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection