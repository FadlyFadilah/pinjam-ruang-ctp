@extends('layouts.user')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.cm.title_singular') }}
        </div>

        <div class="card-body">
            <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#alur">
                        <button type="button" class="step-trigger" role="tab" aria-controls="alur" id="alur-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">Alur Pendaftaran CMS</span>
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
                    <form method="POST" action="{{ route('user.cms.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div id="alur" class="content" role="tabpanel" aria-labelledby="alur-trigger">
                            <h1>SOP</h1>
                            <p>
                                1. Yang akan mendaftarkan Cimahi Maker Space, wajib mengisi formulir di website : http://pelita.cimahitechnopark.id/ .<br>
                                2. Setelah mengisi formulir di website, calon peserta CMS wajib mengikuti seleksi talent scouting (menyerahkan portfolio) ke tim Publikasi.<br>
                                3. Setelah mengikuti talent scouting peserta yang lolos akan di panggil untuk mengikuti seleksi pitching project dengan Mentor. <br>
                                4. Peserta yang lolos berhak mengikuti program Cimahi Maker Space selama 1 (satu) tahun.<br>
                                5. Dalam Program Cimahi Maker Space, peserta Cimahi Maker Space wajib mengikuti kegiatan diantaranya Workshop 4x dalam setahun,Bootcamp Satu Tahun Hanya 1x, dan Evaluasi Setiap Bulan.<br>
                                6. Setelah melakukan program Cimahi Maker Space selama 1 (satu) tahun, di akhir kegiatan akan ada penilaian akhir dan Kegiatan Maneuver Day di akhir kegiatan, untuk memperlihatkan hasil karya peserta Cimahi Maker Space.
                            </p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="checkboxId" onchange="toggleButton()">
                                <label class="form-check-label" for="checkbox">
                                    Ya, saya sudah membaca dan saya setuju atas prosedur diatas.
                                </label>
                            </div>
                            <button id="nextButton" class="btn btn-primary" onclick="stepper.next()" disabled>Next</button>

                        </div>
                        <div id="data" class="content" role="tabpanel" aria-labelledby="data-trigger">

                            <div class="form-group">
                                <label for="user_id">{{ trans('cruds.cm.fields.user') }}</label>
                                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}"
                                    name="user_id" id="user_id">
                                    @foreach ($users as $id => $entry)
                                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>
                                            {{ $entry }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('user'))
                                    <span class="text-danger">{{ $errors->first('user') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.cm.fields.user_helper') }}</span>
                            </div>
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
                                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat" required>{{ old('alamat') }}</textarea>
                                @if ($errors->has('alamat'))
                                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.cm.fields.alamat_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="asal_sekolah">{{ trans('cruds.cm.fields.asal_sekolah') }}</label>
                                <input class="form-control {{ $errors->has('asal_sekolah') ? 'is-invalid' : '' }}"
                                    type="text" name="asal_sekolah" id="asal_sekolah"
                                    value="{{ old('asal_sekolah', '') }}">
                                @if ($errors->has('asal_sekolah'))
                                    <span class="text-danger">{{ $errors->first('asal_sekolah') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.cm.fields.asal_sekolah_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="jurusan">{{ trans('cruds.cm.fields.jurusan') }}</label>
                                <input class="form-control {{ $errors->has('jurusan') ? 'is-invalid' : '' }}"
                                    type="text" name="jurusan" id="jurusan" value="{{ old('jurusan', '') }}">
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
                                <label class="required"
                                    for="ketertarikan">{{ trans('cruds.cm.fields.ketertarikan') }}</label>
                                <textarea class="form-control {{ $errors->has('ketertarikan') ? 'is-invalid' : '' }}" name="ketertarikan"
                                    id="ketertarikan" required>{{ old('ketertarikan') }}</textarea>
                                @if ($errors->has('ketertarikan'))
                                    <span class="text-danger">{{ $errors->first('ketertarikan') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.cm.fields.ketertarikan_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="email">{{ trans('cruds.cm.fields.email') }}</label>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    type="email" name="email" id="email" value="{{ old('email') }}" required>
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
                                <input class="form-control {{ $errors->has('sosmed') ? 'is-invalid' : '' }}"
                                    type="text" name="sosmed" id="sosmed" value="{{ old('sosmed', '') }}">
                                @if ($errors->has('sosmed'))
                                    <span class="text-danger">{{ $errors->first('sosmed') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.cm.fields.sosmed_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label>{{ trans('cruds.cm.fields.status') }}</label>
                                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}"
                                    name="status" id="status">
                                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>
                                        {{ trans('global.pleaseSelect') }}</option>
                                    @foreach (App\Models\Cm::STATUS_SELECT as $key => $label)
                                        <option value="{{ $key }}"
                                            {{ old('status', 'Pending') === (string) $key ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('status'))
                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.cm.fields.status_helper') }}</span>
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
