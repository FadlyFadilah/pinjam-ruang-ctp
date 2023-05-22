@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.pkl.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pkls.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.pkl.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', '') }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pkl.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="asal_sekolah">{{ trans('cruds.pkl.fields.asal_sekolah') }}</label>
                <input class="form-control {{ $errors->has('asal_sekolah') ? 'is-invalid' : '' }}" type="text" name="asal_sekolah" id="asal_sekolah" value="{{ old('asal_sekolah', '') }}" required>
                @if($errors->has('asal_sekolah'))
                    <span class="text-danger">{{ $errors->first('asal_sekolah') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pkl.fields.asal_sekolah_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alamat">{{ trans('cruds.pkl.fields.alamat') }}</label>
                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat">{{ old('alamat') }}</textarea>
                @if($errors->has('alamat'))
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pkl.fields.alamat_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="no_hp">{{ trans('cruds.pkl.fields.no_hp') }}</label>
                <input class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', '') }}" required>
                @if($errors->has('no_hp'))
                    <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pkl.fields.no_hp_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.pkl.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pkl.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lama">Dari Tanggal</label>
                <input class="form-control date {{ $errors->has('lama') ? 'is-invalid' : '' }}" type="text" name="lama" id="lama" value="{{ old('lama') }}" required>
                @if($errors->has('lama'))
                    <span class="text-danger">{{ $errors->first('lama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.penelitian.fields.lama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sampai">Sampai Tanggal</label>
                <input class="form-control date {{ $errors->has('sampai') ? 'is-invalid' : '' }}" type="text" name="sampai" id="sampai" value="{{ old('sampai') }}" required>
                @if($errors->has('sampai'))
                    <span class="text-danger">{{ $errors->first('sampai') }}</span>
                @endif
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
    Dropzone.options.kesbangDropzone = {
    url: '{{ route('admin.pkls.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="kesbang"]').remove()
      $('form').append('<input type="hidden" name="kesbang" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="kesbang"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($pkl) && $pkl->kesbang)
      var file = {!! json_encode($pkl->kesbang) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="kesbang" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.hasilDropzone = {
    url: '{{ route('admin.pkls.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="hasil"]').remove()
      $('form').append('<input type="hidden" name="hasil" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="hasil"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($pkl) && $pkl->hasil)
      var file = {!! json_encode($pkl->hasil) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="hasil" value="' + file.file_name + '">')
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