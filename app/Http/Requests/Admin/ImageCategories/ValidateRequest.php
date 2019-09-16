<?php

namespace App\Http\Requests\Admin\ImageCategories;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required'
        ];
    }
}
