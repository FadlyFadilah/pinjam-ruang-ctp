@extends('layouts.admin')
@section('content')
@can('pkl_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.pkls.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.pkl.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.pkl.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Pkl">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.pkl.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.pkl.fields.nama') }}
                        </th>
                        <th>
                            {{ trans('cruds.pkl.fields.asal_sekolah') }}
                        </th>
                        <th>
                            {{ trans('cruds.pkl.fields.alamat') }}
                        </th>
                        <th>
                            {{ trans('cruds.pkl.fields.no_hp') }}
                        </th>
                        <th>
                            {{ trans('cruds.pkl.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.pkl.fields.lama') }}
                        </th>
                        <th>
                            {{ trans('cruds.pkl.fields.kesbang') }}
                        </th>
                        <th>
                            {{ trans('cruds.pkl.fields.hasil') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pkls as $key => $pkl)
                        <tr data-entry-id="{{ $pkl->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $pkl->id ?? '' }}
                            </td>
                            <td>
                                {{ $pkl->nama ?? '' }}
                            </td>
                            <td>
                                {{ $pkl->asal_sekolah ?? '' }}
                            </td>
                            <td>
                                {{ $pkl->alamat ?? '' }}
                            </td>
                            <td>
                                {{ $pkl->no_hp ?? '' }}
                            </td>
                            <td>
                                {{ $pkl->email ?? '' }}
                            </td>
                            <td>
                                {{ $pkl->lama ?? '' }}
                            </td>
                            <td>
                                @if($pkl->kesbang)
                                    <a href="{{ $pkl->kesbang->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($pkl->hasil)
                                    <a href="{{ $pkl->hasil->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('pkl_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.pkls.show', $pkl->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('pkl_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.pkls.edit', $pkl->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('pkl_delete')
                                    <form action="{{ route('admin.pkls.destroy', $pkl->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('pkl_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pkls.massDestroy') }}",
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
  let table = $('.datatable-Pkl:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection