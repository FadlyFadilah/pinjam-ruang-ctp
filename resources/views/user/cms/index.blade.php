@extends('layouts.user')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.cm.title_singular') }}
        </div>

        <div class="card-body">
            @if ($cm)
                @if ($cm->status = 'diterima')
                    <h5>Selamat! Anda Lolos Ditanyakan Lolos Seleksi Cimahi Marker Space.</h5>
                @else
                    <form method="POST" action="#" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="required" for="nama">{{ trans('cruds.cm.fields.nama') }}</label>
                            <input disabled class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}"
                                type="text" name="nama" id="nama" value="{{ old('nama', $cm->nama) }}" required>
                            @if ($errors->has('nama'))
                                <span class="text-danger">{{ $errors->first('nama') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cm.fields.nama_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="alamat">{{ trans('cruds.cm.fields.alamat') }}</label>
                            <textarea disabled class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat"
                                required>{{ old('alamat', $cm->alamat) }}</textarea>
                            @if ($errors->has('alamat'))
                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cm.fields.alamat_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="asal_sekolah">{{ trans('cruds.cm.fields.asal_sekolah') }}</label>
                            <input disabled class="form-control {{ $errors->has('asal_sekolah') ? 'is-invalid' : '' }}"
                                type="text" name="asal_sekolah" id="asal_sekolah"
                                value="{{ old('asal_sekolah', $cm->asal_sekolah) }}">
                            @if ($errors->has('asal_sekolah'))
                                <span class="text-danger">{{ $errors->first('asal_sekolah') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cm.fields.asal_sekolah_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">{{ trans('cruds.cm.fields.jurusan') }}</label>
                            <input disabled class="form-control {{ $errors->has('jurusan') ? 'is-invalid' : '' }}"
                                type="text" name="jurusan" id="jurusan" value="{{ old('jurusan', $cm->jurusan) }}">
                            @if ($errors->has('jurusan'))
                                <span class="text-danger">{{ $errors->first('jurusan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cm.fields.jurusan_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="portofolio">{{ trans('cruds.cm.fields.portofolio') }}</label>
                            @if ($cm->portofolio)
                                <a href="{{ $cm->portofolio->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                            @if ($errors->has('portofolio'))
                                <span class="text-danger">{{ $errors->first('portofolio') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cm.fields.portofolio_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="ketertarikan">{{ trans('cruds.cm.fields.ketertarikan') }}</label>
                            <textarea disabled class="form-control {{ $errors->has('ketertarikan') ? 'is-invalid' : '' }}" name="ketertarikan"
                                id="ketertarikan" required>{{ old('ketertarikan', $cm->ketertarikan) }}</textarea>
                            @if ($errors->has('ketertarikan'))
                                <span class="text-danger">{{ $errors->first('ketertarikan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cm.fields.ketertarikan_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="email">{{ trans('cruds.cm.fields.email') }}</label>
                            <input disabled class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                type="email" name="email" id="email" value="{{ old('email', $cm->email) }}"
                                required>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cm.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="no">{{ trans('cruds.cm.fields.no') }}</label>
                            <input disabled class="form-control {{ $errors->has('no') ? 'is-invalid' : '' }}"
                                type="text" name="no" id="no" value="{{ old('no', $cm->no) }}" required>
                            @if ($errors->has('no'))
                                <span class="text-danger">{{ $errors->first('no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cm.fields.no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sosmed">{{ trans('cruds.cm.fields.sosmed') }}</label>
                            <input disabled class="form-control {{ $errors->has('sosmed') ? 'is-invalid' : '' }}"
                                type="text" name="sosmed" id="sosmed" value="{{ old('sosmed', $cm->sosmed) }}">
                            @if ($errors->has('sosmed'))
                                <span class="text-danger">{{ $errors->first('sosmed') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cm.fields.sosmed_helper') }}</span>
                        </div>
                    </form>
                @endif
            @else
                <form method="POST" action="{{ route('user.cms.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="required" for="nama">{{ trans('cruds.cm.fields.nama') }}</label>
                        <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text"
                            name="nama" id="nama" value="{{ old('nama', '') }}" required>
                        @if ($errors->has('nama'))
                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.cm.fields.nama_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required" for="alamat">{{ trans('cruds.cm.fields.alamat') }}</label>
                        <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat"
                            required>{{ old('alamat') }}</textarea>
                        @if ($errors->has('alamat'))
                            <span class="text-danger">{{ $errors->first('alamat') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.cm.fields.alamat_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="asal_sekolah">{{ trans('cruds.cm.fields.asal_sekolah') }}</label>
                        <input class="form-control {{ $errors->has('asal_sekolah') ? 'is-invalid' : '' }}" type="text"
                            name="asal_sekolah" id="asal_sekolah" value="{{ old('asal_sekolah', '') }}">
                        @if ($errors->has('asal_sekolah'))
                            <span class="text-danger">{{ $errors->first('asal_sekolah') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.cm.fields.asal_sekolah_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">{{ trans('cruds.cm.fields.jurusan') }}</label>
                        <input class="form-control {{ $errors->has('jurusan') ? 'is-invalid' : '' }}" type="text"
                            name="jurusan" id="jurusan" value="{{ old('jurusan', '') }}">
                        @if ($errors->has('jurusan'))
                            <span class="text-danger">{{ $errors->first('jurusan') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.cm.fields.jurusan_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="portofolio">{{ trans('cruds.cm.fields.portofolio') }}</label>
                        <div class="needsclick dropzone {{ $errors->has('portofolio') ? 'is-invalid' : '' }}"
                            id="portofolio-dropzone">
                        </div>
                        @if ($errors->has('portofolio'))
                            <span class="text-danger">{{ $errors->first('portofolio') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.cm.fields.portofolio_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required" for="ketertarikan">{{ trans('cruds.cm.fields.ketertarikan') }}</label>
                        <textarea class="form-control {{ $errors->has('ketertarikan') ? 'is-invalid' : '' }}" name="ketertarikan"
                            id="ketertarikan" required>{{ old('ketertarikan') }}</textarea>
                        @if ($errors->has('ketertarikan'))
                            <span class="text-danger">{{ $errors->first('ketertarikan') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.cm.fields.ketertarikan_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required" for="email">{{ trans('cruds.cm.fields.email') }}</label>
                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                            name="email" id="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.cm.fields.email_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required" for="no">{{ trans('cruds.cm.fields.no') }}</label>
                        <input class="form-control {{ $errors->has('no') ? 'is-invalid' : '' }}" type="text"
                            name="no" id="no" value="{{ old('no', '') }}" required>
                        @if ($errors->has('no'))
                            <span class="text-danger">{{ $errors->first('no') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.cm.fields.no_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="sosmed">{{ trans('cruds.cm.fields.sosmed') }}</label>
                        <input class="form-control {{ $errors->has('sosmed') ? 'is-invalid' : '' }}" type="text"
                            name="sosmed" id="sosmed" value="{{ old('sosmed', '') }}">
                        @if ($errors->has('sosmed'))
                            <span class="text-danger">{{ $errors->first('sosmed') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.cm.fields.sosmed_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        Dropzone.options.portofolioDropzone = {
            url: '{{ route('user.cms.storeMedia') }}',
            maxFilesize: 2, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2
            },
            success: function(file, response) {
                $('form').find('input[name="portofolio"]').remove()
                $('form').append('<input type="hidden" name="portofolio" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="portofolio"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($cm) && $cm->portofolio)
                    var file = {!! json_encode($cm->portofolio) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="portofolio" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
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
