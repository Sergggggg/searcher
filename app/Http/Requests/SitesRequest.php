<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SitesRequest extends FormRequest
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
           
            'link' => 'required|string|unique:sites,link',
            'language'=> 'required|string',
            'attendance'=> 'required|integer'

        ];
    }


    protected function failedValidation(Validator $validator) { 

        throw new HttpResponseException(
          response()->json([
            'status' => false,
            'messages' => $validator->errors()->all()
          ], 200)
        ); 
    }

}
