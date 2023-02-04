<?php

namespace App\Traits;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| Api Form Validation Responser Trait
|--------------------------------------------------------------------------
|
| This trait will be used for validation response we sent to clients.
|
*/

trait formValidationResponse
{
    /**
     * Return a validation error JSON response.
     *
     * @param Validator $validator
     * @return JsonResponse
     * @throws ValidationException
     */
    public function failedValidation(Validator $validator)
    {
        $response = new Response(['status'=>'Error','message' => $validator->errors()], 422);
        throw new ValidationException($validator, $response);
    }
}
