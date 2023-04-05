<?php

namespace App\Http\Requests;

use App\Models\PeminjamanStudioDubbing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePeminjamanStudioDubbingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('peminjaman_studio_dubbing_edit');
    }

    public function rules()
    {
        return [
            'nama' => [
                'string',
                'required',
            ],
            'ktp' => [
                'string',
                'required',
            ],
            'no_hp' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'booking' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'selesai_booking' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'persetujuan' => [
                'required',
            ],
        ];
    }
}