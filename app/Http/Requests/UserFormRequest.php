<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
        return [
            'nombres'=>'required|max:200',
            'apellidos'=>'required|max:200',
            'dni'=>'required|min:8',
            'fechanac'=>'required|date',
            'telefono'=>'required',
            'direccion'=>'required',
            'email'=>'required',
            'imagen'=>'mimes:jpeg,bmp,png'
        ];
    }
}
