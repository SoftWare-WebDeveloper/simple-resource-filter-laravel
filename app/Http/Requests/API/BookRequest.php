<?php

namespace App\Http\Requests\API;

class BookRequest extends ApiRequest
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
        if(request()->method() == "GET"){
            return $this->rulesForGET();
        }

        if(request()->method() == "POST"){
            return $this->rulesForPOST();
        }
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
    */
    public function messages() {
        return [
            "ISBN.regex" => "Invalid​ ISBN",
            "ISBN.required" => "ISBN is required"
        ];
    }


    /**
     * validation rules that apply to the GET request.
     *
     * @return array
    */
    public function rulesForGET() {
        return [
            'ISBN' => ['regex:/^[0-9]{3}[-][0-9]{10}/','nullable'],
            'author' => 'max:100|string|nullable',
            'title' => 'string|nullable',
            'category' => 'max:100|string|nullable',
        ];
    }

    /**
     * validation rules that apply to the POST request.
     *
     * @return array
    */
    public function rulesForPOST() {
        return [
            'ISBN' => ['required','regex:/^[0-9]{3}[-][0-9]{10}/'],
            'author' => 'required|max:100|string',
            'title' => 'required|max:255|string',
            'category' => 'required|max:100|string',
            'price' => 'numeric|required'
        ];
    }

}
