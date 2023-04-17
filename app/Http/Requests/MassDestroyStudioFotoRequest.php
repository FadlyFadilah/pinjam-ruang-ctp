<?php

namespace App\Http\Requests;

use App\Models\StudioFoto;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStudioFotoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('studio_foto_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:studio_fotos,id',
        ];
    }
}