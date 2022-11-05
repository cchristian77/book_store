<?php

namespace App\Http\Validation\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'username' => 'required|min:6|unique:users,username',
            'password' => 'required|min:6',
            'first_name' => 'required',
            'middle_name' => 'nullable|sometimes',
            'last_name' => 'required',
            'address' => 'required|string',
            'place_of_birth' => 'required|string',
            'date_of_birth' => 'required|date_format:Y-m-d',
            'phone_number' => 'nullable|sometimes|integer|min_digits:6',
            'gender' => 'required|string|in:M,F',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = new JsonResponse([
            'message' => $validator->errors(),
        ],400);

        throw new ValidationException($validator, $response);
    }
}
