<?php

namespace App\Http\Requests;

use App\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'    => [
                'required',
                'string',
                'max:255',
            ],
            'email'   => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'password' => [
                'nullable',
                'string',
                Password::min(8)->letters()->mixedCase()->numbers(),
                'confirmed',
            ],
            'roles.*' => [
                'integer',
            ],
            'roles'   => [
                'required',
                'array',
            ],
        ];
    }
}
