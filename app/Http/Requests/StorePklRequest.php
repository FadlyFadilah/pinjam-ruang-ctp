<?php

namespace App\Http\Requests;

use App\Models\Pkl;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePklRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pkl_create');
    }

    public function rules()
    {
        return [
            'nama' => [
                'string',
                'required',
            ],
            'asal_sekolah' => [
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
            'lama' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}