<?php

namespace App\Http\Requests;

use App\Models\PeminjamanCh;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePeminjamanChRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('peminjaman_ch_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'ktp' => [
                'string',
                'required',
            ],
            'nama' => [
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
            'tujuan' => [
                'string',
                'required',
            ],
            'booking' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'selesai' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'jumlah' => [
                'required',
                'integer',
                'min:0',
                'max:200',
            ],
            'persetujuan' => [
                'required',
            ],
            'persetujuan_2' => [
                'required',
            ],
        ];
    }
}