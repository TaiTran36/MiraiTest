<?php

namespace App\Http\Request;

use App\Supports\Message;

class DeleteAccountRequest extends ApiRequest
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
}
