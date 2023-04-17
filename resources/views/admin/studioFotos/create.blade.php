@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.studioFoto.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.studio-fotos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="pemohon">{{ trans('cruds.studioFoto.fields.pemohon') }}</label>
                <input class="form-control {{ $errors->has('pemohon') ? 'is-invalid' : '' }}" type="text" name="pemohon" id="pemohon" value="{{ old('pemohon', '') }}" required>
                @if($errors->has('pemohon'))
                    <span class="text-danger">{{ $errors->first('pemohon') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.studioFoto.fields.pemohon_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="alamat">{{ trans('cruds.studioFoto.fields.alamat') }}</label>
                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat" required>{{ old('alamat') }}</textarea>
                @if($errors->has('alamat'))
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.studioFoto.fields.alamat_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="wa">{{ trans('cruds.studioFoto.fields.wa') }}</label>
                <input class="form-control {{ $errors->has('wa') ? 'is-invalid' : '' }}" type="text" name="wa" id="wa" value="{{ old('wa', '') }}" required>
                @if($errors->has('wa'))
                    <span class="text-danger">{{ $errors->first('wa') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.studioFoto.fields.wa_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="produk">{{ trans('cruds.studioFoto.fields.produk') }}</label>
                <input class="form-control {{ $errors->has('produk') ? 'is-invalid' : '' }}" type="text" name="produk" id="produk" value="{{ old('produk', '') }}" required>
                @if($errors->has('produk'))
                    <span class="text-danger">{{ $errors->first('produk') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.studioFoto.fields.produk_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="profil">{{ trans('cruds.studioFoto.fields.profil') }}</label>
                <textarea class="form-control {{ $errors->has('profil') ? 'is-invalid' : '' }}" name="profil" id="profil" required>{{ old('profil') }}</textarea>
                @if($errors->has('profil'))
                    <span class="text-danger">{{ $errors->first('profil') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.studioFoto.fields.profil_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.studioFoto.fields.konten') }}</label>
                <select class="form-control {{ $errors->has('konten') ? 'is-invalid' : '' }}" name="konten" id="konten" required>
                    <option value disabled {{ old('konten', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\StudioFoto::KONTEN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('konten', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('konten'))
                    <span class="text-danger">{{ $errors->first('konten') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.studioFoto.fields.konten_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ktp">{{ trans('cruds.studioFoto.fields.ktp') }}</label>
                <div class="needsclick dropzone {{ $errors->has('ktp') ? 'is-invalid' : '' }}" id="ktp-dropzone">
                </div>
                @if($errors->has('ktp'))
                    <span class="text-danger">{{ $errors->first('ktp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.studioFoto.fields.ktp_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="oss">{{ trans('cruds.studioFoto.fields.oss') }}</label>
                <input class="form-control {{ $errors->has('oss') ? 'is-invalid' : '' }}" type="text" name="oss" id="oss" value="{{ old('oss', '') }}" required>
                @if($errors->has('oss'))
                    <span class="text-danger">{{ $errors->first('oss') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.studioFoto.fields.oss_helper') }}</span>
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
    Dropzone.options.ktpDropzone = {
    url: '{{ route('admin.studio-fotos.storeMedia') }}',
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
      $('form').find('input[name="ktp"]').remove()
      $('form').append('<input type="hidden" name="ktp" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="ktp"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($studioFoto) && $studioFoto->ktp)
      var file = {!! json_encode($studioFoto->ktp) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="ktp" value="' + file.file_name + '">')
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