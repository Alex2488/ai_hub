<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'email|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Не назначено ім'я",
            'name.max' => "Ім'я не може бути довше 255 символів",
            'name.string' => 'Помилка в полі',
            'email' => 'Введіть корректнну пошту',

        ];
    }
}
