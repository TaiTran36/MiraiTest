<?php

namespace App\Http\Request;

use App\Supports\Message;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class ApiRequest extends FormRequest
{
    public function rules(): array
    {
        return [];
    }

    /**
     * Validation message
     *
     * @return array
     */
    public function messages(): array
    {
        return [];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json(['errors' => $errors, 'code'=> 401], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }

    public function getChild(string $type): mixed
    {
        $child = null;
        if(class_exists($type)) {
            $child = app($type);
        }

        return $child;
    }
}
