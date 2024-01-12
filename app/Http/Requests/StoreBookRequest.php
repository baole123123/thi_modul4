<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'number' => 'required|numeric',
            'year' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường bắt buộc nhập.',
            'author.required' => 'Trường bắt buộc nhập.',
            'category.required' => 'Trường bắt buộc nhập.',
            'number.required' => 'Trường bắt buộc nhập.',
            'number.numeric' => 'Trường chỉ được chấp nhận số.',
            'year.required' => 'Trường bắt buộc nhập.',
            'year.integer' => 'Trường chỉ được chấp nhận số.',
        ];
    }
}
