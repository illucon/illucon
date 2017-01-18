<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentInfoRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
//        return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'image'       => 'max:1024',
//                'email' => 'required|email',
//                'comments' => 'required|max:255|min:5',
        ];
    }

    public function messages() {
        return [
//            'first_name.required' => 'We need to know your name',
//            'body.required' => 'A message is required',
        ];
    }

}
