<?php

namespace App\Http\Requests;

use App\Transaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateTransactionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('transaction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'project_id'          => [
                'required',
                'integer',
                'exists:projects,id',
            ],
            'transaction_type_id' => [
                'required',
                'integer',
                'exists:transaction_types,id',
            ],
            'income_source_id'    => [
                'required',
                'integer',
                'exists:income_sources,id',
            ],
            'amount'              => [
                'required',
                'numeric',
            ],
            'currency_id'         => [
                'required',
                'integer',
                'exists:currencies,id',
            ],
            'transaction_date'    => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'name'                => [
                'nullable',
                'string',
                'max:255',
            ],
            'description'         => [
                'nullable',
                'string',
            ],
        ];
    }
}
