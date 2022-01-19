<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{

    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    //protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'task_group_id' => 'required|numeric|exists:task_groups,task_group_id',
            'parent_task_id' => 'nullable|numeric|exists:tasks,task_id',
            'name' => 'required|min:3|max:500',
            'description' => 'required',
            'priority' => 'required|numeric|between:1,5',
            'task_status_id' => 'required|numeric|exists:task_statuses,task_status_id',
            'creator_user_id' => 'required|numeric|exists:users,id',
            'assigned_user_id' => 'required|numeric|exists:users,id',
            'date_due' => 'nullable|date_format:Y-m-d',
            'task_label_id' => 'nullable|array|exists:task_labels,task_label_id'
        ];
    }
}
