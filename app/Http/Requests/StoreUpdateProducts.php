<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProducts extends FormRequest
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
        $id = $this->segment(3);
        $rules =  [
            'title' => ['required',"unique:products,title,{$id},id" ,'string','min:3' ,'max:255'],
            'description' => ['nullable', 'string','min:3' ,'max:1000'],
            'image'       => ['required','image'],
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",

         
        ];

        if($this->method() == 'PUT') {
            $rules['image'] = ['nullable' , 'image'];
        }

        return $rules;

    }
}
