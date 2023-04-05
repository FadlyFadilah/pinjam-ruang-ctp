@extends('layouts.admin')
@section('content')
@can('peminjaman_studio_dubbing_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.peminjaman-studio-dubbings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.peminjamanStudioDubbing.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.peminjamanStudioDubbing.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PeminjamanStudioDubbing">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.peminjamanStudioDubbing.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanStudioDubbing.fields.nama') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanStudioDubbing.fields.ktp') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanStudioDubbing.fields.alamat') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanStudioDubbing.fields.no_hp') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanStudioDubbing.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanStudioDubbing.fields.booking') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanStudioDubbing.fields.selesai_booking') }}
                        </th>
                        <th>
                            {{ trans('cruds.peminjamanStudioDubbing.fields.operator') }}
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
                    @foreach($peminjamanStudioDubbings as $key => $peminjamanStudioDubbing)
                        <tr data-entry-id="{{ $peminjamanStudioDubbing->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $peminjamanStudioDubbing->id ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanStudioDubbing->nama ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanStudioDubbing->ktp ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanStudioDubbing->alamat ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanStudioDubbing->no_hp ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanStudioDubbing->email ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanStudioDubbing->booking ?? '' }}
                            </td>
                            <td>
                                {{ $peminjamanStudioDubbing->selesai_booking ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PeminjamanStudioDubbing::OPERATOR_RADIO[$peminjamanStudioDubbing->operator] ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $peminjamanStudioDubbing->persetujuan ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $peminjamanStudioDubbing->persetujuan ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('peminjaman_studio_dubbing_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.peminjaman-studio-dubbings.show', $peminjamanStudioDubbing->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('peminjaman_studio_dubbing_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.peminjaman-studio-dubbings.edit', $peminjamanStudioDubbing->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('peminjaman_studio_dubbing_delete')
                                    <form action="{{ route('admin.peminjaman-studio-dubbings.destroy', $peminjamanStudioDubbing->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('peminjaman_studio_dubbing_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.peminjaman-studio-dubbings.massDestroy') }}",
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
  let table = $('.datatable-PeminjamanStudioDubbing:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection