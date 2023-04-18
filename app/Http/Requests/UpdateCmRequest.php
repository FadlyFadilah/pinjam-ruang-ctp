<?php

namespace App\Http\Requests;

use App\Cm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCmRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cm_edit');
    }

    public function rules()
    {
        return [
            'nama' => [
                'string',
                'required',
            ],
            'alamat' => [
                'required',
            ],
            'asal_sekolah' => [
                'string',
                'nullable',
            ],
            'jurusan' => [
                'string',
                'nullable',
            ],
            'ketertarikan' => [
                'required',
            ],
            'email' => [
                'required',
            ],
            'no' => [
                'string',
                'required',
            ],
            'sosmed' => [
                'string',
                'nullable',
            ],
        ];
    }
}