<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReporteRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reglas = [];

        if($this->isMethod('post')){
            $reglas = [
                'title' => 'required|string',
                'start'=>'required|date|before:end',
                'end'=>'required|date'
            ];
        }
        if($this->isMethod('get') && $this->route('report_id')){
            $reglas = [
                'id' => 'required|integer|exists:reports,id'
            ];
        }
        return $reglas;

    }

    public function prepareForValidation(){
        if($this->route('report_id')){
            $this->merge(['id' => $this->route('report_id')]);
        }
    }
}
