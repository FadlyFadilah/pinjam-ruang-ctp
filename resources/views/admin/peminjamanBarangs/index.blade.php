@extends('layouts.admin')
@section('content')
@can('peminjaman_barang_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.peminjaman-barangs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.peminjamanBarang.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.peminjamanBarang.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PeminjamanBarang">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.peminjamanBarang.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanBarang.fields.barang') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanBarang.fields.nama_usaha') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanBarang.fields.alamat') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanBarang.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanBarang.fields.ktp') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanBarang.fields.booking') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanBarang.fields.tujuan') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanBarang.fields.no_hp') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanBarang.fields.email') }}
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
                    @foreach($peminjamanBarangs as $key => $peminjamanBarang)
                        <tr data-entry-id="{{ $peminjamanBarang->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $peminjamanBarang->id ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanBarang->barang->nama_barang ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanBarang->nama_usaha ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanBarang->alamat ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanBarang->name ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanBarang->ktp ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanBarang->booking ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanBarang->tujuan ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanBarang->no_hp ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanBarang->email ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanBarang->status ?? 'Pending' }}
                            </td>
                            <td>
                                @can('peminjaman_barang_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.peminjaman-barangs.show', $peminjamanBarang->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                <form action="{{ route('admin.peminjaman-barangs.ubahstatus', $peminjamanBarang->id) }}" method="POST"
                                    onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                    style="display: inline-block;">
                                    @method('PATCH')
                                    @csrf
                                    <input type="hidden" name="status" value="Diterima">
                                    <input type="submit" class="btn btn-xs btn-success" value="Terima">
                                </form>

                                <form action="{{ route('admin.peminjaman-barangs.ubahstatus', $peminjamanBarang->id) }}" method="POST"
                                    onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                    style="display: inline-block;">
                                    @method('PATCH')
                                    @csrf
                                    <input type="hidden" name="status" value="Tidak Diterima">
                                    <input type="submit" class="btn btn-xs btn-warning" value="Tolak">
                                </form>

                                @can('peminjaman_barang_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.peminjaman-barangs.edit', $peminjamanBarang->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('peminjaman_barang_delete')
                                    <form action="{{ route('admin.peminjaman-barangs.destroy', $peminjamanBarang->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('peminjaman_barang_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.peminjaman-barangs.massDestroy') }}",
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
  let table = $('.datatable-PeminjamanBarang:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection