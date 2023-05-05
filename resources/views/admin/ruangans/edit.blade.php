@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.ruangan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ruangans.update", [$ruangan->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nama_ruangan">{{ trans('cruds.ruangan.fields.nama_ruangan') }}</label>
                <input class="form-control {{ $errors->has('nama_ruangan') ? 'is-invalid' : '' }}" type="text" name="nama_ruangan" id="nama_ruangan" value="{{ old('nama_ruangan', $ruangan->nama_ruangan) }}" required>
                @if($errors->has('nama_ruangan'))
                    <span class="text-danger">{{ $errors->first('nama_ruangan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ruangan.fields.nama_ruangan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kapasitas">{{ trans('cruds.ruangan.fields.kapasitas') }}</label>
                <input class="form-control {{ $errors->has('kapasitas') ? 'is-invalid' : '' }}" type="number" name="kapasitas" id="kapasitas" value="{{ old('kapasitas', $ruangan->kapasitas) }}" step="1">
                @if($errors->has('kapasitas'))
                    <span class="text-danger">{{ $errors->first('kapasitas') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ruangan.fields.kapasitas_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lokasi">{{ trans('cruds.ruangan.fields.lokasi') }}</label>
                <input class="form-control {{ $errors->has('lokasi') ? 'is-invalid' : '' }}" type="text" name="lokasi" id="lokasi" value="{{ old('lokasi', $ruangan->lokasi) }}" required>
                @if($errors->has('lokasi'))
                    <span class="text-danger">{{ $errors->first('lokasi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ruangan.fields.lokasi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="deskripsi">{{ trans('cruds.ruangan.fields.deskripsi') }}</label>
                <textarea class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" name="deskripsi" id="deskripsi">{{ old('deskripsi', $ruangan->deskripsi) }}</textarea>
                @if($errors->has('deskripsi'))
                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ruangan.fields.deskripsi_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.ruangan.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Ruangan::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $ruangan->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ruangan.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gambar">{{ trans('cruds.ruangan.fields.gambar') }}</label>
                <div class="needsclick dropzone {{ $errors->has('gambar') ? 'is-invalid' : '' }}" id="gambar-dropzone">
                </div>
                @if($errors->has('gambar'))
                    <span class="text-danger">{{ $errors->first('gambar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ruangan.fields.gambar_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.gambarDropzone = {
    url: '{{ route('admin.ruangans.storeMedia') }}',
    maxFilesize: 15, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 15,
      width: 4496,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="gambar"]').remove()
      $('form').append('<input type="hidden" name="gambar" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="gambar"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($ruangan) && $ruangan->gambar)
      var file = {!! json_encode($ruangan->gambar) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="gambar" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection