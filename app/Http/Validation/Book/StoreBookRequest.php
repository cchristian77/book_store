<?php

namespace App\Http\Validation\Book;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class StoreBookRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'price' => 'required|integer',
            'release_date' => 'required|date_format:Y-m-d',
            'is_published' => 'required|string|in:0,1',
            'page' => 'required|integer',
            'synopsis' => 'nullable|sometimes|string',
            'cover' => 'nullable|sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //file size max 2MB
            'publisher_id' => 'required|exists:publishers,id', // only existing id in publisher

            'authors' => 'required|array',
            'authors.*' => 'required|array|min:1',
            'authors.*.id' => 'required|exists:authors,id',

            'genres' => 'required|array',
            'genres.*' => 'required|array|min:1',
            'genres.*.id' => 'required|exists:genres,id',
        ];
    }
}
