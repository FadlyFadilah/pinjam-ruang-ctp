@extends('layouts.admin')
@section('content')
@can('cm_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.cms.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.cm.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.cm.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Cm">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.cm.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.cm.fields.nama') }}
                        </th>
                        <th>
                            {{ trans('cruds.cm.fields.alamat') }}
                        </th>
                        <th>
                            {{ trans('cruds.cm.fields.asal_sekolah') }}
                        </th>
                        <th>
                            {{ trans('cruds.cm.fields.jurusan') }}
                        </th>
                        <th>
                            {{ trans('cruds.cm.fields.portofolio') }}
                        </th>
                        <th>
                            {{ trans('cruds.cm.fields.ketertarikan') }}
                        </th>
                        <th>
                            {{ trans('cruds.cm.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.cm.fields.no') }}
                        </th>
                        <th>
                            {{ trans('cruds.cm.fields.sosmed') }}
                        </th>
                        <th>
                            {{ trans('cruds.cm.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cms as $key => $cm)
                        <tr data-entry-id="{{ $cm->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $cm->id ?? '' }}
                            </td>
                            <td>
                                {{ $cm->nama ?? '' }}
                            </td>
                            <td>
                                {{ $cm->alamat ?? '' }}
                            </td>
                            <td>
                                {{ $cm->asal_sekolah ?? '' }}
                            </td>
                            <td>
                                {{ $cm->jurusan ?? '' }}
                            </td>
                            <td>
                                @if($cm->portofolio)
                                    <a href="{{ $cm->portofolio->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $cm->ketertarikan ?? '' }}
                            </td>
                            <td>
                                {{ $cm->email ?? '' }}
                            </td>
                            <td>
                                {{ $cm->no ?? '' }}
                            </td>
                            <td>
                                {{ $cm->sosmed ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Cm::STATUS_SELECT[$cm->status] ?? 'Pending' }}
                            </td>
                            <td>
                                @can('cm_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.cms.show', $cm->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('cm_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.cms.edit', $cm->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('cm_delete')
                                    <form action="{{ route('admin.cms.destroy', $cm->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('cm_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.cms.massDestroy') }}",
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
  let table = $('.datatable-Cm:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection