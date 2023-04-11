@extends('layouts.user')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pkl.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('user.pkls.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pkl.fields.id') }}
                        </th>
                        <td>
                            {{ $pkl->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pkl.fields.nama') }}
                        </th>
                        <td>
                            {{ $pkl->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pkl.fields.asal_sekolah') }}
                        </th>
                        <td>
                            {{ $pkl->asal_sekolah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pkl.fields.alamat') }}
                        </th>
                        <td>
                            {{ $pkl->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pkl.fields.no_hp') }}
                        </th>
                        <td>
                            {{ $pkl->no_hp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pkl.fields.email') }}
                        </th>
                        <td>
                            {{ $pkl->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pkl.fields.lama') }}
                        </th>
                        <td>
                            {{ $pkl->lama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pkl.fields.kesbang') }}
                        </th>
                        <td>
                            @if($pkl->kesbang)
                                <a href="{{ $pkl->kesbang->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pkl.fields.hasil') }}
                        </th>
                        <td>
                            @if($pkl->hasil)
                                <a href="{{ $pkl->hasil->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('user.pkls.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection