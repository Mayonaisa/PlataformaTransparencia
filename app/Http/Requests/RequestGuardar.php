<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class RequestGuardar extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fraccion_id' => 'required',
            'titulo' => 'required',
            'descripcion' => 'required',
            'articulo' => 'required',
            'check' => 'nullable',
            'documento' => 'required|file|mimes:pdf,xlsx|max:2048',
        ];
    }
}