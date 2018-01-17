<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->route('project')->user_id === $this->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama'      => [
                'required',
                'min:2',
                'max:100',
                Rule::unique('projects')->ignore($this->route('project')->id)
            ],
            'deskripsi' => 'required|min:2|max:1000',
            'client_id' => 'required|exists:clients,id'
        ];
    }
}
