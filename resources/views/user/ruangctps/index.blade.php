@extends('layouts.user')
@section('content')
@can('ruangctp_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('user.ruangctps.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.ruangctp.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.ruangctp.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Ruangctp">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.ruangctp.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.ruangctp.fields.ruangan') }}
                        </th>
                        <th>
                            {{ trans('cruds.ruangctp.fields.nama') }}
                        </th>
                        <th>
                            {{ trans('cruds.ruangctp.fields.mulai') }}
                        </th>
                        <th>
                            {{ trans('cruds.ruangctp.fields.mulaijam') }}
                        </th>
                        <th>
                            {{ trans('cruds.ruangctp.fields.selesai') }}
                        </th>
                        <th>
                            {{ trans('cruds.ruangctp.fields.selesaijam') }}
                        </th>
                        <th>
                            {{ trans('cruds.ruangctp.fields.nama_acara') }}
                        </th>
                        <th>
                            {{ trans('cruds.ruangctp.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ruangctps as $key => $ruangctp)
                        <tr data-entry-id="{{ $ruangctp->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $ruangctp->id ?? '' }}
                            </td>
                            <td>
                                {{ $ruangctp->ruangan->nama_ruangan ?? '' }}
                            </td>
                            <td>
                                {{ $ruangctp->nama ?? '' }}
                            </td>
                            <td>
                                {{ $ruangctp->mulai ?? '' }}
                            </td>
                            <td>
                                {{ $ruangctp->mulaijam ?? '' }}
                            </td>
                            <td>
                                {{ $ruangctp->selesai ?? '' }}
                            </td>
                            <td>
                                {{ $ruangctp->selesaijam ?? '' }}
                            </td>
                            <td>
                                {{ $ruangctp->nama_acara ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Ruangctp::STATUS_SELECT[$ruangctp->status] ?? 'Sedang Dalam Proses' }}
                            </td>
                            <td>
                                @can('ruangctp_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('user.ruangctps.show', $ruangctp->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                
                                @can('ruangctp_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('user.ruangctps.edit', $ruangctp->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('ruangctp_delete')
                                    <form action="{{ route('user.ruangctps.destroy', $ruangctp->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('ruangctp_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('user.ruangctps.massDestroy') }}",
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
    pageLength: 10,
  });
  let table = $('.datatable-Ruangctp:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection