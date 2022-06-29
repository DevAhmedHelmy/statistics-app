<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => ($this->isMethod('post')) ? 'required|string|email|max:255|unique:users' : 'required|string|email|max:255|unique:users,id' . $this->id,
            'password' => ($this->isMethod('post')) ? 'required|string|min:8' : 'nullable',
            'phone' => 'required|string|max:255',
        ];
    }
}
