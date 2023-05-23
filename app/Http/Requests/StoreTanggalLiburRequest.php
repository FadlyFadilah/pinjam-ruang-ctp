<?php

namespace App\Http\Requests;

use App\Models\TanggalLibur;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTanggalLiburRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tanggal_libur_create');
    }

    public function rules()
    {
        return [
            'tanggal' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'keterangan' => [
                'string',
                'nullable',
            ],
        ];
    }
}