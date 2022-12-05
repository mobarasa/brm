<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'title'     => 'required|alpha_spaces',
            'location'      => 'required|alpha_spaces',
            'published'      => 'required',
            'upload_image'     => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'start_date'    => 'required|date',
            'end_date'      => 'required|date|after_or_equal:start_date',
            'media_link' => 'nullable|url',
            'content'      => 'required',
            'category_id'  => 'required|integer|exists:categories,id'
        ];
    }
}
