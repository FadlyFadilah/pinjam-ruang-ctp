<?php

namespace App\Http\Requests;

use App\Models\PeminjamanRuangKacaBitc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePeminjamanRuangKacaBitcRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('peminjaman_ruang_kaca_bitc_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
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
            'tanggal_booking' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'selesai_booking' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'jumlah' => [
                'required',
                'integer',
                'min:0',
                'max:10',
            ],
            'aggrement' => [
                'required',
            ],
        ];
    }
}