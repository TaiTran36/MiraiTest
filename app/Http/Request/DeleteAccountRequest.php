<?php

namespace App\Http\Request;

use App\Supports\Message;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class DeleteAccountRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'login' => ['required'],
        ];
    }

    /**
     * Validation message
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'login.required' => Message::LOGIN_REQUIRED,
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json(['errors' => $errors, 'code'=> 401], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
