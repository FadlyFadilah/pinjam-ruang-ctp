@extends('layouts.user')
@section('content')
@can('penelitian_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('user.penelitians.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.penelitian.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.penelitian.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Penelitian">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.penelitian.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.penelitian.fields.nama') }}
                        </th>
                        <th>
                            {{ trans('cruds.penelitian.fields.no_hp') }}
                        </th>
                        <th>
                            {{ trans('cruds.penelitian.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.penelitian.fields.univ') }}
                        </th>
                        <th>
                            {{ trans('cruds.penelitian.fields.alamat') }}
                        </th>
                        <th>
                            Dari Tanggal
                        </th>
                        <th>
                            Sampai Tanggal
                        </th>
                        <th>
                            {{ trans('cruds.penelitian.fields.judul') }}
                        </th>
                        <th>
                            {{ trans('cruds.penelitian.fields.kesbang') }}
                        </th>
                        <th>
                            {{ trans('cruds.penelitian.fields.hasil') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penelitians as $key => $penelitian)
                        <tr data-entry-id="{{ $penelitian->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $penelitian->id ?? '' }}
                            </td>
                            <td>
                                {{ $penelitian->nama ?? '' }}
                            </td>
                            <td>
                                {{ $penelitian->no_hp ?? '' }}
                            </td>
                            <td>
                                {{ $penelitian->email ?? '' }}
                            </td>
                            <td>
                                {{ $penelitian->univ ?? '' }}
                            </td>
                            <td>
                                {{ $penelitian->alamat ?? '' }}
                            </td>
                            <td>
                                {{ $penelitian->lama ?? '' }}
                            </td>
                            <td>
                                {{ $penelitian->sampai ?? '' }}
                            </td>
                            <td>
                                {{ $penelitian->judul ?? '' }}
                            </td>
                            <td>
                                @if($penelitian->kesbang)
                                    <a href="{{ $penelitian->kesbang->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($penelitian->hasil)
                                    <a href="{{ $penelitian->hasil->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('penelitian_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('user.penelitians.show', $penelitian->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('penelitian_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('user.penelitians.edit', $penelitian->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('penelitian_delete')
                                    <form action="{{ route('user.penelitians.destroy', $penelitian->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('penelitian_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('user.penelitians.massDestroy') }}",
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
  let table = $('.datatable-Penelitian:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection