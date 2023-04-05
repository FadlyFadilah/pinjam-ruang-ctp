<?php

namespace App\Http\Requests;

use App\Models\PeminjamanBarang;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePeminjamanBarangRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('peminjaman_barang_create');
    }

    public function rules()
    {
        return [
            'barang_id' => [
                'required',
                'integer',
            ],
            'nama_usaha' => [
                'string',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'ktp' => [
                'string',
                'required',
            ],
            'booking' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'tujuan' => [
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
        ];
    }
}