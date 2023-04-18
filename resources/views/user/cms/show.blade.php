@extends('layouts.user')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.cm.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('user.cms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cm.fields.id') }}
                        </th>
                        <td>
                            {{ $cm->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cm.fields.nama') }}
                        </th>
                        <td>
                            {{ $cm->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cm.fields.alamat') }}
                        </th>
                        <td>
                            {{ $cm->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cm.fields.asal_sekolah') }}
                        </th>
                        <td>
                            {{ $cm->asal_sekolah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cm.fields.jurusan') }}
                        </th>
                        <td>
                            {{ $cm->jurusan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cm.fields.portofolio') }}
                        </th>
                        <td>
                            @if($cm->portofolio)
                                <a href="{{ $cm->portofolio->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cm.fields.ketertarikan') }}
                        </th>
                        <td>
                            {{ $cm->ketertarikan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cm.fields.email') }}
                        </th>
                        <td>
                            {{ $cm->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cm.fields.no') }}
                        </th>
                        <td>
                            {{ $cm->no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cm.fields.sosmed') }}
                        </th>
                        <td>
                            {{ $cm->sosmed }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cm.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Cm::STATUS_SELECT[$cm->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('user.cms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection