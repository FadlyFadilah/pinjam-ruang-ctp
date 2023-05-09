@extends('layouts.admin')
@section('content')
@can('studio_foto_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.studio-fotos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.studioFoto.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.studioFoto.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-StudioFoto">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.studioFoto.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.studioFoto.fields.pemohon') }}
                        </th>
                        <th>
                            {{ trans('cruds.studioFoto.fields.alamat') }}
                        </th>
                        <th>
                            {{ trans('cruds.studioFoto.fields.wa') }}
                        </th>
                        <th>
                            {{ trans('cruds.studioFoto.fields.produk') }}
                        </th>
                        <th>
                            {{ trans('cruds.studioFoto.fields.profil') }}
                        </th>
                        <th>
                            {{ trans('cruds.studioFoto.fields.konten') }}
                        </th>
                        <th>
                            {{ trans('cruds.studioFoto.fields.ktp') }}
                        </th>
                        <th>
                            {{ trans('cruds.studioFoto.fields.oss') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($studioFotos as $key => $studioFoto)
                        <tr data-entry-id="{{ $studioFoto->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $studioFoto->id ?? '' }}
                            </td>
                            <td>
                                {{ $studioFoto->pemohon ?? '' }}
                            </td>
                            <td>
                                {{ $studioFoto->alamat ?? '' }}
                            </td>
                            <td>
                                {{ $studioFoto->wa ?? '' }}
                            </td>
                            <td>
                                {{ $studioFoto->produk ?? '' }}
                            </td>
                            <td>
                                {{ $studioFoto->profil ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\StudioFoto::KONTEN_SELECT[$studioFoto->konten] ?? '' }}
                            </td>
                            <td>
                                @if($studioFoto->ktp)
                                    <a href="{{ $studioFoto->ktp->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $studioFoto->ktp->getUrl() }}" width="50" height="50">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $studioFoto->oss ?? '' }}
                            </td>
                            <td>
                                @can('studio_foto_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.studio-fotos.show', $studioFoto->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('studio_foto_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.studio-fotos.edit', $studioFoto->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('studio_foto_delete')
                                    <form action="{{ route('admin.studio-fotos.destroy', $studioFoto->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('studio_foto_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.studio-fotos.massDestroy') }}",
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
  let table = $('.datatable-StudioFoto:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection