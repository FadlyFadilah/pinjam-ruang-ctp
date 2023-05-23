@extends('layouts.user')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ruangctp.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('user.ruangctps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.id') }}
                        </th>
                        <td>
                            {{ $ruangctp->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.ruangan') }}
                        </th>
                        <td>
                            {{ $ruangctp->ruangan->nama_ruangan ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.skpd') }}
                        </th>
                        <td>
                            {{ App\Models\Ruangctp::SKPD_SELECT[$ruangctp->skpd] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.bidang_kegiatan') }}
                        </th>
                        <td>
                            {{ App\Models\Ruangctp::BIDANG_KEGIATAN_SELECT[$ruangctp->bidang_kegiatan] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.nama') }}
                        </th>
                        <td>
                            {{ $ruangctp->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.alamat') }}
                        </th>
                        <td>
                            {{ $ruangctp->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.kelurahan') }}
                        </th>
                        <td>
                            {{ $ruangctp->kelurahan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.kecamatan') }}
                        </th>
                        <td>
                            {{ $ruangctp->kecamatan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.kota') }}
                        </th>
                        <td>
                            {{ $ruangctp->kota }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.kodepos') }}
                        </th>
                        <td>
                            {{ $ruangctp->kodepos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.no') }}
                        </th>
                        <td>
                            {{ $ruangctp->no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.ktp') }}
                        </th>
                        <td>
                            {{ $ruangctp->ktp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.instansi') }}
                        </th>
                        <td>
                            {{ $ruangctp->instansi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.statusdiinstansi') }}
                        </th>
                        <td>
                            {{ $ruangctp->statusdiinstansi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.bidanginstansi') }}
                        </th>
                        <td>
                            {{ $ruangctp->bidanginstansi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.alamatinstansi') }}
                        </th>
                        <td>
                            {{ $ruangctp->alamatinstansi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.mulai') }}
                        </th>
                        <td>
                            {{ $ruangctp->mulai }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.mulaijam') }}
                        </th>
                        <td>
                            {{ $ruangctp->mulaijam }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.selesai') }}
                        </th>
                        <td>
                            {{ $ruangctp->selesai }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.selesaijam') }}
                        </th>
                        <td>
                            {{ $ruangctp->selesaijam }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.nama_acara') }}
                        </th>
                        <td>
                            {{ $ruangctp->nama_acara }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.jumlah_peserta') }}
                        </th>
                        <td>
                            {{ $ruangctp->jumlah_peserta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.narasumber') }}
                        </th>
                        <td>
                            {{ $ruangctp->narasumber }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.outpu') }}
                        </th>
                        <td>
                            {{ $ruangctp->outpu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.outcome') }}
                        </th>
                        <td>
                            {{ $ruangctp->outcome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.ringkasan') }}
                        </th>
                        <td>
                            {{ $ruangctp->ringkasan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.surat_permohonan') }}
                        </th>
                        <td>
                            @if($ruangctp->surat_permohonan)
                                <a href="{{ $ruangctp->surat_permohonan->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.rundown') }}
                        </th>
                        <td>
                            {{ App\Models\Ruangctp::RUNDOWN_RADIO[$ruangctp->rundown] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.rundown_proposal') }}
                        </th>
                        <td>
                            @if($ruangctp->rundown_proposal)
                                <a href="{{ $ruangctp->rundown_proposal->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.rundown_barang') }}
                        </th>
                        <td>
                            @if($ruangctp->rundown_barang)
                                <a href="{{ $ruangctp->rundown_barang->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.rundown_persiapan') }}
                        </th>
                        <td>
                            @if($ruangctp->rundown_persiapan)
                                <a href="{{ $ruangctp->rundown_persiapan->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.gladiresik') }}
                        </th>
                        <td>
                            {{ App\Models\Ruangctp::GLADIRESIK_RADIO[$ruangctp->gladiresik] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ruangctp.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Ruangctp::STATUS_SELECT[$ruangctp->status] ?? 'Sedang Dalam Proses' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('user.ruangctps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection