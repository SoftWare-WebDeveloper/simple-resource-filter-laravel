<?php


namespace App\Http\Requests\API;


use App\Http\Traits\Responses;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class ApiRequest extends FormRequest
{
    use Responses;

    /**
     * custom Handle a failed validation attempt for API.
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $message = $validator->errors()->first();
        throw new HttpResponseException($this->badRequestResponse($message));
    }

}