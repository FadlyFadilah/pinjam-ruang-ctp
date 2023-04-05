<?php

namespace App\Http\Requests;

use App\Models\Kp;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyKpRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('kp_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:kps,id',
        ];
    }
}