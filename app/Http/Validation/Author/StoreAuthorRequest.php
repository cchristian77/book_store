<?php

namespace App\Http\Validation\Author;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class StoreAuthorRequest extends FormRequest
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

    protected function failedValidation(Validator $validator)
    {
        $response = new JsonResponse([
            'message' => $validator->errors(),
        ], 400);

        throw new ValidationException($validator, $response);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email',
            'gender' => 'required|string|in:M,F',
            'address' => 'required|string|max:255',
            'place_of_birth' => 'required|string',
            'date_of_birth' => 'required|date_format:Y-m-d',
            'nationality' => 'required',
            'profile_picture' => 'nullable|sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //file size max 2MB
            'about' => 'nullable|sometimes|string',
        ];
    }
}
