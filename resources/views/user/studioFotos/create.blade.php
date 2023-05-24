@extends('layouts.user')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.studioFoto.title_singular') }}
        </div>

        <div class="card-body">
            <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#alur">
                        <button type="button" class="step-trigger" role="tab" aria-controls="alur" id="alur-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">Alur Peminjaman studio Foto</span>
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
                    <form method="POST" action="{{ route('user.studio-fotos.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div id="alur" class="content" role="tabpanel" aria-labelledby="alur-trigger">
                            <h1>SOP</h1>
                            <p>
                                1. Yang akan melakukan foto produk, wajib mengisi formulir di website : http://pelita.cimahitechnopark.id/.<br>
                                2. Setelah mengisi data di website,  admin akan mendisposisi surat tersebut kepada Kepala UPTD. Cimahi Techno Park.<br> 
                                3. Setelah turun disposisi, akan ada arahan dari Kepala UPTD. Cimahi Techno Park kepada Admin.<br>
                                4. Admin akan menghubungi Tenant atau UKM apabila di setujui sesuai dengan waktu yang telah dijadwalkan.<br>
                                5. Setelah selesai pengerjaan Foto Produk tenant/UKM, admin akan menghubungi untuk melihat hasil yang telah di buat.

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
                                <label class="required"
                                    for="pemohon">{{ trans('cruds.studioFoto.fields.pemohon') }}</label>
                                <input class="form-control {{ $errors->has('pemohon') ? 'is-invalid' : '' }}" type="text"
                                    name="pemohon" id="pemohon" value="{{ old('pemohon', '') }}" required>
                                @if ($errors->has('pemohon'))
                                    <span class="text-danger">{{ $errors->first('pemohon') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.studioFoto.fields.pemohon_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="alamat">{{ trans('cruds.studioFoto.fields.alamat') }}</label>
                                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat" required>{{ old('alamat') }}</textarea>
                                @if ($errors->has('alamat'))
                                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.studioFoto.fields.alamat_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="wa">{{ trans('cruds.studioFoto.fields.wa') }}</label>
                                <input class="form-control {{ $errors->has('wa') ? 'is-invalid' : '' }}" type="text"
                                    name="wa" id="wa" value="{{ old('wa', '') }}" required>
                                @if ($errors->has('wa'))
                                    <span class="text-danger">{{ $errors->first('wa') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.studioFoto.fields.wa_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="produk">{{ trans('cruds.studioFoto.fields.produk') }}</label>
                                <input class="form-control {{ $errors->has('produk') ? 'is-invalid' : '' }}" type="text"
                                    name="produk" id="produk" value="{{ old('produk', '') }}" required>
                                @if ($errors->has('produk'))
                                    <span class="text-danger">{{ $errors->first('produk') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.studioFoto.fields.produk_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="profil">{{ trans('cruds.studioFoto.fields.profil') }}</label>
                                <textarea class="form-control {{ $errors->has('profil') ? 'is-invalid' : '' }}" name="profil" id="profil" required>{{ old('profil') }}</textarea>
                                @if ($errors->has('profil'))
                                    <span class="text-danger">{{ $errors->first('profil') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.studioFoto.fields.profil_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required">{{ trans('cruds.studioFoto.fields.konten') }}</label>
                                <select class="form-control {{ $errors->has('konten') ? 'is-invalid' : '' }}"
                                    name="konten" id="konten" required>
                                    <option value disabled {{ old('konten', null) === null ? 'selected' : '' }}>
                                        {{ trans('global.pleaseSelect') }}</option>
                                    @foreach (App\Models\StudioFoto::KONTEN_SELECT as $key => $label)
                                        <option value="{{ $key }}"
                                            {{ old('konten', '') === (string) $key ? 'selected' : '' }}>
                                            {{ $label }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('konten'))
                                    <span class="text-danger">{{ $errors->first('konten') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.studioFoto.fields.konten_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="ktp">{{ trans('cruds.studioFoto.fields.ktp') }}</label>
                                <div class="needsclick dropzone {{ $errors->has('ktp') ? 'is-invalid' : '' }}"
                                    id="ktp-dropzone">
                                </div>
                                @if ($errors->has('ktp'))
                                    <span class="text-danger">{{ $errors->first('ktp') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.studioFoto.fields.ktp_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="oss">{{ trans('cruds.studioFoto.fields.oss') }}</label>
                                <input class="form-control {{ $errors->has('oss') ? 'is-invalid' : '' }}" type="text"
                                    name="oss" id="oss" value="{{ old('oss', '') }}" required>
                                @if ($errors->has('oss'))
                                    <span class="text-danger">{{ $errors->first('oss') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.studioFoto.fields.oss_helper') }}</span>
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
        Dropzone.options.ktpDropzone = {
            url: '{{ route('user.studio-fotos.storeMedia') }}',
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
                $('form').find('input[name="ktp"]').remove()
                $('form').append('<input type="hidden" name="ktp" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="ktp"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($studioFoto) && $studioFoto->ktp)
                    var file = {!! json_encode($studioFoto->ktp) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="ktp" value="' + file.file_name + '">')
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
