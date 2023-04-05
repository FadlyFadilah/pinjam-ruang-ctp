<?php

namespace App\Http\Requests;

use App\Models\PeminjamanCh;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPeminjamanChRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('peminjaman_ch_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:peminjaman_ches,id',
        ];
    }
}