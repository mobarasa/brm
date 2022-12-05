<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name'     => 'required|alpha_spaces',
            'gender'      => 'required',
            'email'      => 'required|email',
            'phone_number'      => 'required',
            'position'      => 'required',
            'published'      => 'required',
            'content'      => 'required',
            'roles'  => 'required',
            'upload_image'     => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ];
    }
}
