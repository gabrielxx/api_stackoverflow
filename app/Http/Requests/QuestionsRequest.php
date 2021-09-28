<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    public function messages()
    {
        return [
            "fromdate.date_format"  => "Formato de Fecha no valido: YYYY-MM-DD",
            "todate.date_format"    => "Formato de Fecha no valido: YYYY-MM-DD",
            "fromdate.date"         => "Fecha no valida",
            "todate.date"           => "Fecha no valida",  
            "tagged.required"       => "Campo obligatorio"

        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tagged' => 'required',
            'todate' => 'date|date_format:Y-m-d',
            'fromdate' => 'date|date_format:Y-m-d'
        ];
    }
}
