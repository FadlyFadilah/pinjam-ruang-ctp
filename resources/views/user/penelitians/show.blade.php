@extends('layouts.user')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.penelitian.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('user.penelitians.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.penelitian.fields.id') }}
                        </th>
                        <td>
                            {{ $penelitian->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penelitian.fields.nama') }}
                        </th>
                        <td>
                            {{ $penelitian->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penelitian.fields.no_hp') }}
                        </th>
                        <td>
                            {{ $penelitian->no_hp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penelitian.fields.email') }}
                        </th>
                        <td>
                            {{ $penelitian->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penelitian.fields.univ') }}
                        </th>
                        <td>
                            {{ $penelitian->univ }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penelitian.fields.alamat') }}
                        </th>
                        <td>
                            {{ $penelitian->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Dari Tanggal
                        </th>
                        <td>
                            {{ $penelitian->lama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Sampai Tanggal
                        </th>
                        <td>
                            {{ $penelitian->sampai }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penelitian.fields.judul') }}
                        </th>
                        <td>
                            {{ $penelitian->judul }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penelitian.fields.kesbang') }}
                        </th>
                        <td>
                            @if($penelitian->kesbang)
                                <a href="{{ $penelitian->kesbang->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penelitian.fields.hasil') }}
                        </th>
                        <td>
                            @if($penelitian->hasil)
                                <a href="{{ $penelitian->hasil->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('user.penelitians.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection