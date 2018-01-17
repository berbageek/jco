<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
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
            'nama'      => 'required|min:2|max:100|unique:projects,nama',
            'deskripsi' => 'required|min:2|max:1000',
            'client_id' => 'required|exists:clients,id'
        ];
    }

    public function messages()
    {
        return [];
    }

    public function attributes()
    {
        return [
            'nama'      => 'Name',
            'client_id' => 'Client',
            'deskripsi' => 'Description',
        ];
    }
}
