<?php

namespace App\Http\Requests;

use App\Models\Ruangctp;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRuangctpRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ruangctp_create');
    }

    public function rules()
    {
        return [
            'ruangan_id' => [
                'required',
                'integer',
            ],
            'skpd' => [
                'required',
            ],
            'bidang_kegiatan' => [
                'required',
            ],
            'nama' => [
                'string',
                'required',
            ],
            'alamat' => [
                'required',
            ],
            'kelurahan' => [
                'string',
                'required',
            ],
            'kecamatan' => [
                'string',
                'required',
            ],
            'kota' => [
                'string',
                'required',
            ],
            'kodepos' => [
                'string',
                'required',
            ],
            'no' => [
                'string',
                'required',
            ],
            'ktp' => [
                'string',
                'required',
            ],
            'instansi' => [
                'string',
                'required',
            ],
            'statusdiinstansi' => [
                'string',
                'nullable',
            ],
            'bidanginstansi' => [
                'string',
                'required',
            ],
            'mulai' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'mulaijam' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'selesai' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'selesaijam' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'nama_acara' => [
                'string',
                'required',
            ],
            'jumlah_peserta' => [
                'string',
                'required',
            ],
            'narasumber' => [
                'string',
                'required',
            ],
            'outpu' => [
                'string',
                'nullable',
            ],
            'outcome' => [
                'string',
                'nullable',
            ],
            'ringkasan' => [
                'required',
            ],
            'surat_permohonan' => [
                'required',
            ],
        ];
    }
}