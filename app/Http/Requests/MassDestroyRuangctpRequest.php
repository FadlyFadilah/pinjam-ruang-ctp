<?php

namespace App\Http\Requests;

use App\Models\Ruangctp;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRuangctpRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ruangctp_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:ruangctps,id',
        ];
    }
}