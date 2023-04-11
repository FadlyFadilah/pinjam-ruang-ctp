@extends('layouts.user')
@section('content')
@can('kp_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.kps.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.kp.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.kp.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Kp">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.kp.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.kp.fields.nama') }}
                        </th>
                        <th>
                            {{ trans('cruds.kp.fields.univ') }}
                        </th>
                        <th>
                            {{ trans('cruds.kp.fields.no_hp') }}
                        </th>
                        <th>
                            {{ trans('cruds.kp.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.kp.fields.alamat') }}
                        </th>
                        <th>
                            {{ trans('cruds.kp.fields.lama') }}
                        </th>
                        <th>
                            {{ trans('cruds.kp.fields.kesbang') }}
                        </th>
                        <th>
                            {{ trans('cruds.kp.fields.hasil') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kps as $key => $kp)
                        <tr data-entry-id="{{ $kp->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $kp->id ?? '' }}
                            </td>
                            <td>
                                {{ $kp->nama ?? '' }}
                            </td>
                            <td>
                                {{ $kp->univ ?? '' }}
                            </td>
                            <td>
                                {{ $kp->no_hp ?? '' }}
                            </td>
                            <td>
                                {{ $kp->email ?? '' }}
                            </td>
                            <td>
                                {{ $kp->alamat ?? '' }}
                            </td>
                            <td>
                                {{ $kp->lama ?? '' }}
                            </td>
                            <td>
                                @if($kp->kesbang)
                                    <a href="{{ $kp->kesbang->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($kp->hasil)
                                    <a href="{{ $kp->hasil->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('kp_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.kps.show', $kp->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('kp_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.kps.edit', $kp->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('kp_delete')
                                    <form action="{{ route('admin.kps.destroy', $kp->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('kp_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.kps.massDestroy') }}",
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
  let table = $('.datatable-Kp:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection