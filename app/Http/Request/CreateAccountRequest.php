<?php

namespace App\Http\Request;

use App\Supports\Message;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class CreateAccountRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'login' => ['required'],
            'password_confirmation' => ['required'],
            'password' => ['required', 'confirmed'],
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
            'password_confirmation.required' => Message::PASSWORD_CONFIRMATION_REQUIRED,
            'password.required' => Message::PASSWORD_REQUIRED,
            'password.confirmed' => Message::PASSWORD_NOT_MATCH,
        ];
    }
}
