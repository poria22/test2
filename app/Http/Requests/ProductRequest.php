<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'Name' => ['required', 'string', 'max:255'],
            'Weight' => ['required', 'numeric'],
            'Number' => ['required', 'numeric'],
            'Image' => ['required', 'mimes:jpeg,png,jpg', 'max:2048']
        ];
    }

    public function messages()
    {
        return [
            'Name.required' => 'وارد کردن نام اجباریست',
            'Weight.required' => 'وارد کردن وزن اجباریست',
            'Number.required' => 'وارد کردن تعداد اجباریست',
            'Image.required' => 'وارد کردن تصویر اجباریست',
            'Image.mimes' => 'فرمت تصویر باید png,jpg,jpeg باشد',
        ];
    }
}
