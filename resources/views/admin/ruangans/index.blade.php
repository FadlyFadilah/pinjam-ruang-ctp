@extends('layouts.admin')
@section('content')
@can('ruangan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.ruangans.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.ruangan.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.ruangan.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Ruangan">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.ruangan.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.ruangan.fields.nama_ruangan') }}
                        </th>
                        <th>
                            {{ trans('cruds.ruangan.fields.kapasitas') }}
                        </th>
                        <th>
                            {{ trans('cruds.ruangan.fields.lokasi') }}
                        </th>
                        <th>
                            {{ trans('cruds.ruangan.fields.deskripsi') }}
                        </th>
                        <th>
                            {{ trans('cruds.ruangan.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.ruangan.fields.gambar') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ruangans as $key => $ruangan)
                        <tr data-entry-id="{{ $ruangan->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $ruangan->id ?? '' }}
                            </td>
                            <td>
                                {{ $ruangan->nama_ruangan ?? '' }}
                            </td>
                            <td>
                                {{ $ruangan->kapasitas ?? '' }}
                            </td>
                            <td>
                                {{ $ruangan->lokasi ?? '' }}
                            </td>
                            <td>
                                {{ $ruangan->deskripsi ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Ruangan::STATUS_SELECT[$ruangan->status] ?? '' }}
                            </td>
                            <td>
                                @if($ruangan->gambar)
                                    <a href="{{ $ruangan->gambar->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $ruangan->gambar->getUrl() }}" width="50" height="50">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('ruangan_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.ruangans.show', $ruangan->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('ruangan_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.ruangans.edit', $ruangan->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('ruangan_delete')
                                    <form action="{{ route('admin.ruangans.destroy', $ruangan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('ruangan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.ruangans.massDestroy') }}",
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
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Ruangan:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection