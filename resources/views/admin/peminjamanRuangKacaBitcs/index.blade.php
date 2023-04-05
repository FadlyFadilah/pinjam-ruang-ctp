@extends('layouts.admin')
@section('content')
@can('peminjaman_ruang_kaca_bitc_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.peminjaman-ruang-kaca-bitcs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.peminjamanRuangKacaBitc.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.peminjamanRuangKacaBitc.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PeminjamanRuangKacaBitc">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.peminjamanRuangKacaBitc.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanRuangKacaBitc.fields.ruangan') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanRuangKacaBitc.fields.nama') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanRuangKacaBitc.fields.ktp') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanRuangKacaBitc.fields.alamat') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanRuangKacaBitc.fields.no_hp') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanRuangKacaBitc.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanRuangKacaBitc.fields.tanggal_booking') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanRuangKacaBitc.fields.selesai_booking') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanRuangKacaBitc.fields.jumlah') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanRuangKacaBitc.fields.infokus') }}
                        </th>
                        <th>
                            Persetujuan
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peminjamanRuangKacaBitcs as $key => $peminjamanRuangKacaBitc)
                        <tr data-entry-id="{{ $peminjamanRuangKacaBitc->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $peminjamanRuangKacaBitc->id ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanRuangKacaBitc->ruangan->nama_ruangan ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanRuangKacaBitc->nama ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanRuangKacaBitc->ktp ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanRuangKacaBitc->alamat ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanRuangKacaBitc->no_hp ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanRuangKacaBitc->email ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanRuangKacaBitc->tanggal_booking ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanRuangKacaBitc->selesai_booking ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanRuangKacaBitc->jumlah ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PeminjamanRuangKacaBitc::INFOKUS_RADIO[$peminjamanRuangKacaBitc->infokus] ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $peminjamanRuangKacaBitc->aggrement ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $peminjamanRuangKacaBitc->aggrement ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('peminjaman_ruang_kaca_bitc_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.peminjaman-ruang-kaca-bitcs.show', $peminjamanRuangKacaBitc->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('peminjaman_ruang_kaca_bitc_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.peminjaman-ruang-kaca-bitcs.edit', $peminjamanRuangKacaBitc->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('peminjaman_ruang_kaca_bitc_delete')
                                    <form action="{{ route('admin.peminjaman-ruang-kaca-bitcs.destroy', $peminjamanRuangKacaBitc->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('peminjaman_ruang_kaca_bitc_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.peminjaman-ruang-kaca-bitcs.massDestroy') }}",
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
  let table = $('.datatable-PeminjamanRuangKacaBitc:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection