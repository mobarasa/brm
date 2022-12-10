<?php

namespace App\Http\Requests;

use Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSermonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('sermon_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'title'         => ['required', 'alpha_spaces', 'unique:sermons,title,' . request()->route('sermon')->id],
            'preacher'      => 'required|alpha_spaces',
            'bible_passage' => 'required',
            'location'      => 'required|alpha_spaces',
            'published'     => 'required',
            'upload_image'  => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'date_preached' => 'required',
            'media_link'    => 'nullable|url',
            'content'       => 'required',
            'category_id'   => 'required|integer|exists:categories,id'
        ];
    }
}
