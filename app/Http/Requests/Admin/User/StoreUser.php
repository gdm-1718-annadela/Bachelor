<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.user.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'username' => ['required', Rule::unique('users', 'username'), 'string'],
            'name' => ['required', 'string'],
            'firstname' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('users', 'email'), 'string'],
            'email_verified_at' => ['nullable', 'date'],
            'age' => ['required', 'integer'],
            'story' => ['nullable', 'string'],
            'picturetitle' => ['nullable', 'string'],
            'picturepath' => ['nullable', 'string'],
            'password' => ['required', 'confirmed', 'min:7', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/', 'string'],
            'type_id' => ['nullable', 'string'],
            
        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
