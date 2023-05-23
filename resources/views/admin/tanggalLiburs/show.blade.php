@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tanggalLibur.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tanggal-liburs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tanggalLibur.fields.id') }}
                        </th>
                        <td>
                            {{ $tanggalLibur->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tanggalLibur.fields.tanggal') }}
                        </th>
                        <td>
                            {{ $tanggalLibur->tanggal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tanggalLibur.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $tanggalLibur->keterangan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tanggal-liburs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection