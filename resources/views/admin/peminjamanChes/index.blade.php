@extends('layouts.admin')
@section('content')
@can('peminjaman_ch_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.peminjaman-ches.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.peminjamanCh.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.peminjamanCh.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PeminjamanCh">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.ruangan') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.nama') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.ktp') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.alamat') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.no_hp') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.tujuan') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.booking') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.selesai') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.jumlah') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanCh.fields.infokus') }}
                        </th>
                        <th>
                            Persetujuan
                        </th>
                        <th>
                            Persetujuan 2
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peminjamanChes as $key => $peminjamanCh)
                        <tr data-entry-id="{{ $peminjamanCh->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $peminjamanCh->id ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanCh->ruangan->nama_ruangan ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanCh->nama ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanCh->ktp ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanCh->alamat ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanCh->no_hp ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanCh->email ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanCh->tujuan ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanCh->booking ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanCh->selesai ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanCh->jumlah ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PeminjamanCh::INFOKUS_RADIO[$peminjamanCh->infokus] ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanCh->status ?? 'Pending' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $peminjamanCh->persetujuan ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $peminjamanCh->persetujuan ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $peminjamanCh->persetujuan_2 ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $peminjamanCh->persetujuan_2 ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('peminjaman_ch_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.peminjaman-ches.show', $peminjamanCh->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                <form action="{{ route('admin.peminjaman-ches.ubahstatus', $peminjamanCh->id) }}" method="POST"
                                    onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                    style="display: inline-block;">
                                    @method('PATCH')
                                    @csrf
                                    <input type="hidden" name="status" value="Diterima">
                                    <input type="submit" class="btn btn-xs btn-success" value="Terima">
                                </form>

                                <form action="{{ route('admin.peminjaman-ches.ubahstatus', $peminjamanCh->id) }}" method="POST"
                                    onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                    style="display: inline-block;">
                                    @method('PATCH')
                                    @csrf
                                    <input type="hidden" name="status" value="Tidak Diterima">
                                    <input type="submit" class="btn btn-xs btn-warning" value="Tolak">
                                </form>

                                @can('peminjaman_ch_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.peminjaman-ches.edit', $peminjamanCh->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('peminjaman_ch_delete')
                                    <form action="{{ route('admin.peminjaman-ches.destroy', $peminjamanCh->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('peminjaman_ch_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.peminjaman-ches.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-PeminjamanCh:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection