@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.kp.title_singular') }}
        </div>

        <div class="card-body">
            <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#alur">
                        <button type="button" class="step-trigger" role="tab" aria-controls="alur" id="alur-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">Alur Pendaftaran Kerja Praktek</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#data">
                        <button type="button" class="step-trigger" role="tab" aria-controls="data" id="data-trigger">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label">Data Pemohon</span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <form method="POST" action="{{ route('admin.kps.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div id="alur" class="content" role="tabpanel" aria-labelledby="alur-trigger">
                            <h1>SOP</h1>
                            <p>
                                1.	Yang akan magang dan penelitian, wajib mengisi formulir dan upload surat resmi dari sekolah atau universitas di website :  http://pelita.cimahitechnopark.id/<br>
                                2.	Setelah surat tersebut masuk, Management CTP akan mendisposisi surat tersebut kepada Kepala UPTD. Cimahi Techno Park <br>
                                3.	Setelah turun disposisi, akan ada arahan dari Kepala UPTD. Cimahi Techno Park untuk di setujui atau di terima<br>
                                4.	Apabila disponya di setujui atau di terima, maka akan dibuatkan surat pengantar untuk ke Kesbang <br>
                                5.	Setelah ke Kesbang, yang akan melakukan penelitian akan mendapatkan surat rekomendasi dari Kesbang untuk melakukan penelitian atau magang<br>
                                6.	Setelah surat di terima, yang akan melakukan penlitian dapat melaksanakan penelitian atau pkl sesuai dengan tanggal yang tertera.

                            </p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="checkboxId" onchange="toggleButton()">
                                <label class="form-check-label" for="checkbox">
                                    Ya saya sudah mengetahui nya.
                                </label>
                            </div>
                            <button id="nextButton" class="btn btn-primary" onclick="stepper.next()" disabled>Next</button>

                        </div>
                        <div id="data" class="content" role="tabpanel" aria-labelledby="data-trigger">

                            <div class="form-group">
                                <label class="required" for="nama">{{ trans('cruds.kp.fields.nama') }}</label>
                                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text"
                                    name="nama" id="nama" value="{{ old('nama', '') }}" required>
                                @if ($errors->has('nama'))
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.kp.fields.nama_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="univ">{{ trans('cruds.kp.fields.univ') }}</label>
                                <input class="form-control {{ $errors->has('univ') ? 'is-invalid' : '' }}" type="text"
                                    name="univ" id="univ" value="{{ old('univ', '') }}" required>
                                @if ($errors->has('univ'))
                                    <span class="text-danger">{{ $errors->first('univ') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.kp.fields.univ_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="no_hp">{{ trans('cruds.kp.fields.no_hp') }}</label>
                                <input class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" type="text"
                                    name="no_hp" id="no_hp" value="{{ old('no_hp', '') }}" required>
                                @if ($errors->has('no_hp'))
                                    <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.kp.fields.no_hp_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="email">{{ trans('cruds.kp.fields.email') }}</label>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                    name="email" id="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.kp.fields.email_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="alamat">{{ trans('cruds.kp.fields.alamat') }}</label>
                                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat">{{ old('alamat') }}</textarea>
                                @if ($errors->has('alamat'))
                                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.kp.fields.alamat_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="lama">Dari Tanggal</label>
                                <input class="form-control date {{ $errors->has('lama') ? 'is-invalid' : '' }}"
                                    type="text" name="lama" id="lama" value="{{ old('lama') }}" required>
                                @if ($errors->has('lama'))
                                    <span class="text-danger">{{ $errors->first('lama') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.penelitian.fields.lama_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="sampai">Sampai Tanggal</label>
                                <input class="form-control date {{ $errors->has('sampai') ? 'is-invalid' : '' }}"
                                    type="text" name="sampai" id="sampai" value="{{ old('sampai') }}" required>
                                @if ($errors->has('sampai'))
                                    <span class="text-danger">{{ $errors->first('sampai') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                <button class="btn btn-danger" type="submit">
                                    {{ trans('global.save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function toggleButton() {
            var checkbox = document.getElementById("checkboxId");
            var nextButton = document.getElementById("nextButton");

            if (checkbox.checked) {
                nextButton.disabled = false;
            } else {
                nextButton.disabled = true;
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>
    <script>
        Dropzone.options.kesbangDropzone = {
            url: '{{ route('admin.kps.storeMedia') }}',
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
                $('form').find('input[name="kesbang"]').remove()
                $('form').append('<input type="hidden" name="kesbang" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="kesbang"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($kp) && $kp->kesbang)
                    var file = {!! json_encode($kp->kesbang) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="kesbang" value="' + file.file_name + '">')
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
    <script>
        Dropzone.options.hasilDropzone = {
            url: '{{ route('admin.kps.storeMedia') }}',
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
                $('form').find('input[name="hasil"]').remove()
                $('form').append('<input type="hidden" name="hasil" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="hasil"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($kp) && $kp->hasil)
                    var file = {!! json_encode($kp->hasil) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="hasil" value="' + file.file_name + '">')
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
