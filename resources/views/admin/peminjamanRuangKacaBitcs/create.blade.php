@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.peminjamanRuangKacaBitc.title_singular') }}
        </div>

        <div class="card-body">
            <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#alur">
                        <button type="button" class="step-trigger" role="tab" aria-controls="alur" id="alur-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">Alur Peminjaman Ruang Kaca / Meetingroom</span>
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
                    <form method="POST" action="{{ route('admin.peminjaman-ruang-kaca-bitcs.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div id="alur" class="content" role="tabpanel" aria-labelledby="alur-trigger">
                            <h1>SOP</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis odio possimus magnam
                                provident quisquam voluptate id illo consequatur maxime. Vel dolorum exercitationem
                                similique dolore aliquid amet magni praesentium consequatur, maiores suscipit, ut doloribus
                                veniam, eum ipsum ea? Mollitia voluptatum minima placeat sint tenetur vel ipsam aspernatur
                                eligendi, facere cupiditate quam minus est ad, voluptate voluptatem, aliquam deleniti dicta.
                                Dignissimos totam soluta dicta aut necessitatibus voluptates rerum libero adipisci
                                aspernatur ab architecto deserunt repudiandae mollitia excepturi odio, nesciunt nihil
                                dolorum? Dolores aperiam sed at veniam, sunt sit fugiat? Consequatur quisquam veritatis,
                                mollitia, sit dicta et facilis laborum reiciendis tempora a iure.</p>
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
                                <label class="required" for="nama">{{ trans('cruds.peminjamanRuangKacaBitc.fields.nama') }}</label>
                                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama"
                                    id="nama" value="{{ old('nama', '') }}" required>
                                @if ($errors->has('nama'))
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanRuangKacaBitc.fields.nama_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="ktp">{{ trans('cruds.peminjamanRuangKacaBitc.fields.ktp') }}</label>
                                <input class="form-control {{ $errors->has('ktp') ? 'is-invalid' : '' }}" type="text" name="ktp"
                                    id="ktp" value="{{ old('ktp', '') }}" required>
                                @if ($errors->has('ktp'))
                                    <span class="text-danger">{{ $errors->first('ktp') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanRuangKacaBitc.fields.ktp_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="alamat">{{ trans('cruds.peminjamanRuangKacaBitc.fields.alamat') }}</label>
                                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat">{{ old('alamat') }}</textarea>
                                @if ($errors->has('alamat'))
                                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanRuangKacaBitc.fields.alamat_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="no_hp">{{ trans('cruds.peminjamanRuangKacaBitc.fields.no_hp') }}</label>
                                <input class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" type="text"
                                    name="no_hp" id="no_hp" value="{{ old('no_hp', '') }}" required>
                                @if ($errors->has('no_hp'))
                                    <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanRuangKacaBitc.fields.no_hp_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="email">{{ trans('cruds.peminjamanRuangKacaBitc.fields.email') }}</label>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                    name="email" id="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanRuangKacaBitc.fields.email_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required"
                                    for="tanggal_booking">{{ trans('cruds.peminjamanRuangKacaBitc.fields.tanggal_booking') }}</label>
                                <input class="form-control date {{ $errors->has('tanggal_booking') ? 'is-invalid' : '' }}" type="text"
                                    name="tanggal_booking" id="tanggal_booking" value="{{ old('tanggal_booking') }}" required>
                                @if ($errors->has('tanggal_booking'))
                                    <span class="text-danger">{{ $errors->first('tanggal_booking') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanRuangKacaBitc.fields.tanggal_booking_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="selesai_booking">{{ trans('cruds.peminjamanRuangKacaBitc.fields.selesai_booking') }}</label>
                                <input class="form-control date {{ $errors->has('selesai_booking') ? 'is-invalid' : '' }}" type="text"
                                    name="selesai_booking" id="selesai_booking" value="{{ old('selesai_booking') }}">
                                @if ($errors->has('selesai_booking'))
                                    <span class="text-danger">{{ $errors->first('selesai_booking') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanRuangKacaBitc.fields.selesai_booking_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="jumlah">{{ trans('cruds.peminjamanRuangKacaBitc.fields.jumlah') }}</label>
                                <input class="form-control {{ $errors->has('jumlah') ? 'is-invalid' : '' }}" type="number"
                                    name="jumlah" id="jumlah" value="{{ old('jumlah', '') }}" step="1" required>
                                @if ($errors->has('jumlah'))
                                    <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanRuangKacaBitc.fields.jumlah_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label>{{ trans('cruds.peminjamanRuangKacaBitc.fields.infokus') }}</label>
                                @foreach (App\Models\PeminjamanRuangKacaBitc::INFOKUS_RADIO as $key => $label)
                                    <div class="form-check {{ $errors->has('infokus') ? 'is-invalid' : '' }}">
                                        <input class="form-check-input" type="radio" id="infokus_{{ $key }}" name="infokus"
                                            value="{{ $key }}" {{ old('infokus', '') === (string) $key ? 'checked' : '' }}>
                                        <label class="form-check-label" for="infokus_{{ $key }}">{{ $label }}</label>
                                    </div>
                                @endforeach
                                @if ($errors->has('infokus'))
                                    <span class="text-danger">{{ $errors->first('infokus') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanRuangKacaBitc.fields.infokus_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <div class="form-check {{ $errors->has('aggrement') ? 'is-invalid' : '' }}">
                                    <input class="form-check-input" type="checkbox" name="aggrement" id="aggrement" value="1"
                                        required {{ old('aggrement', 0) == 1 ? 'checked' : '' }}>
                                    <label class="required form-check-label"
                                        for="aggrement">{{ trans('cruds.peminjamanRuangKacaBitc.fields.aggrement') }}</label>
                                </div>
                                @if ($errors->has('aggrement'))
                                    <span class="text-danger">{{ $errors->first('aggrement') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.peminjamanRuangKacaBitc.fields.aggrement_helper') }}</span>
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
@endsection
