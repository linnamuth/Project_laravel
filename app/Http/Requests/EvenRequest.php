<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class EvenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['error' => false, 'message' => $validator->errors()], 402));
    }  
    public function rules(): array
    {
        return [
            //
            'name'=>[
                'required',
                'min:5',
                'max:100',
                Rule::unique('events')->ignore($this->id),      
            ],
            'dateStart'=>[
                'required', 
            ],
             'dateEnd'=>[
                'required',       
            ],
            'location'=>[
                'required', 
            ], 
            'user_id'=>[
                'required',      
            ]
                       
        ];
             
        
        
    }
}
