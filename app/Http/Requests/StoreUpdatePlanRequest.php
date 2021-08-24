<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePlanRequest extends FormRequest
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

    
    public function rules()
    {

        $urlPlano = $this->segment(3);
        //Lancar exeção para quando editar com o mesmo nome    'name' => "required|min:3|max:255|unique:plans,name,{$urlPlano},url",
    
        return [
           'name' => "required|min:3|max:255|unique:plans,name,{$urlPlano},url",
           'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
           'description' => 'nullable|min:3|max:255'

        ];
    }
}
