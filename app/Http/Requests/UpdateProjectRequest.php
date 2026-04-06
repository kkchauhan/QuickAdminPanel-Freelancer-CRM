<?php

namespace App\Http\Requests;

use App\Project;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateProjectRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'       => [
                'required',
                'string',
                'max:255',
            ],
            'client_id'  => [
                'required',
                'integer',
                'exists:clients,id',
            ],
            'start_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'budget'     => [
                'nullable',
                'numeric',
            ],
            'status_id'  => [
                'nullable',
                'integer',
                'exists:project_statuses,id',
            ],
            'description'=> [
                'nullable',
                'string',
            ],
        ];
    }
}
