<?php

namespace App\Http\Requests;

use Gate;
use Symfony\Component\HttpFoundation\Response;
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
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'name'          => 'required|alpha_spaces',
            'gender'        => 'required',
            'email'         => ['required', 'email:rfc,dns', 'unique:users,email,' . request()->route('user')->id],
            'phone_number'  => ['required', 'numeric', 'unique:users,phone_number,' . request()->route('user')->id],
            'position'      => 'required',
            'published'     => 'required',
            'content'       => 'required',
            'roles.*'       => ['integer'],
            'roles'         => ['required', 'array'],
            'upload_image'  => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ];
    }
}
