<?php

namespace LaravelWebauthn\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LaravelWebauthn\Services\Webauthn;

class WebauthnLoginAttemptRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            Webauthn::username() => 'sometimes|string',
        ];
    }
}
