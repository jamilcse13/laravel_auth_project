<?php

namespace App\Http\Requests;

use App\Traits\formValidationResponse;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="Reset password request",
 *      description="Reset password request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class LoginRequest extends FormRequest
{
    use formValidationResponse;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string|min:6'
        ];
    }
}
