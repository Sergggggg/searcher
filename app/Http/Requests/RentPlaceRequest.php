<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RentPlaceRequest extends FormRequest
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
            
            'rent_place_site' => 'required|string',
            'cost_per_rent'=>  'required|int',
            'date_start'=> 'required|date_format:Y.m.d',
            'date_end'=>'required|date_format:Y.m.d',
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
