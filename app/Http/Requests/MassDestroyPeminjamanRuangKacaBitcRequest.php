<?php

namespace App\Http\Requests;

use App\Models\PeminjamanRuangKacaBitc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPeminjamanRuangKacaBitcRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('peminjaman_ruang_kaca_bitc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:peminjaman_ruang_kaca_bitcs,id',
        ];
    }
}