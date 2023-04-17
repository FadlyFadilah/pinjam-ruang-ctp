@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.studioFoto.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.studio-fotos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.studioFoto.fields.id') }}
                        </th>
                        <td>
                            {{ $studioFoto->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studioFoto.fields.pemohon') }}
                        </th>
                        <td>
                            {{ $studioFoto->pemohon }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studioFoto.fields.alamat') }}
                        </th>
                        <td>
                            {{ $studioFoto->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studioFoto.fields.wa') }}
                        </th>
                        <td>
                            {{ $studioFoto->wa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studioFoto.fields.produk') }}
                        </th>
                        <td>
                            {{ $studioFoto->produk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studioFoto.fields.profil') }}
                        </th>
                        <td>
                            {{ $studioFoto->profil }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studioFoto.fields.konten') }}
                        </th>
                        <td>
                            {{ App\Models\StudioFoto::KONTEN_SELECT[$studioFoto->konten] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studioFoto.fields.ktp') }}
                        </th>
                        <td>
                            @if($studioFoto->ktp)
                                <a href="{{ $studioFoto->ktp->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studioFoto.fields.oss') }}
                        </th>
                        <td>
                            {{ $studioFoto->oss }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.studio-fotos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection