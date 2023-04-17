<?php

namespace App\Http\Requests;

use App\Models\StudioFoto;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStudioFotoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('studio_foto_create');
    }

    public function rules()
    {
        return [
            'pemohon' => [
                'string',
                'required',
            ],
            'alamat' => [
                'required',
            ],
            'wa' => [
                'string',
                'required',
            ],
            'produk' => [
                'string',
                'required',
            ],
            'profil' => [
                'required',
            ],
            'konten' => [
                'required',
            ],
            'ktp' => [
                'required',
            ],
            'oss' => [
                'string',
                'required',
            ],
        ];
    }
}