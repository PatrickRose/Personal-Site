<?php

namespace PatrickRose\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\AuthManager;

class Login extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !$this->auth->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required',
        ];
    }
}
