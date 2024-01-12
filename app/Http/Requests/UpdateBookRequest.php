<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'number' => 'required',
            'year' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Trường không được để trống',
            'author.required' => 'Trường không được để trống',
            'category.required' => 'Trường không được để trống',
            'number.required' => 'Trường không được để trống',
            'year.required' => 'Trường không được để trống',



        ];
    }
}
