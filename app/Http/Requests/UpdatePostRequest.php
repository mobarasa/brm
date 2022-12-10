<?php

namespace App\Http\Requests;

use Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'title'         => ['required', 'alpha_spaces', 'unique:posts,title,' . request()->route('post')->id],
            'upload_image'  => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'published'     => 'required',
            'content'       => 'required',
            'category_id'   => 'required|integer|exists:categories,id'
        ];
    }
}
