<?php

namespace App\Http\Requests;

use App\Client;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateClientRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('client_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'first_name' => [
                'required',
                'string',
                'max:255',
            ],
            'last_name' => [
                'nullable',
                'string',
                'max:255',
            ],
            'company' => [
                'nullable',
                'string',
                'max:255',
            ],
            'email' => [
                'nullable',
                'email',
                'max:255',
            ],
            'phone' => [
                'nullable',
                'string',
                'max:255',
            ],
            'website' => [
                'nullable',
                'string',
                'max:255',
            ],
            'skype' => [
                'nullable',
                'string',
                'max:255',
            ],
            'country' => [
                'nullable',
                'string',
                'max:255',
            ],
            'status_id' => [
                'nullable',
                'integer',
                'exists:client_statuses,id',
            ],
        ];
    }
}
