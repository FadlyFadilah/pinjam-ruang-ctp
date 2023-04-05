<?php

namespace App\Http\Requests;

use App\Models\Pkl;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPklRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pkl_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pkls,id',
        ];
    }
}