<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Subscribe;

class StoreSubscribeRequest extends FormRequest
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
            'email'    => [
                'required',
                'email:rfc,dns',
                Rule::unique(Subscribe::class)
            ],
        ];
    }

    public function messages()
    {
        return [
            '*.required'    => 'This field is required',
            '*.email'       => 'This field should contain valid email address',
            '*.unique'      => 'You are already a newsletter subscriber.',
        ];
    }
}
