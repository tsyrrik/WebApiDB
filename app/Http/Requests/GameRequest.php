<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

        /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'developer' => 'required|string|max:255',
            'genres' => 'required|array',
            'genres.*' => 'integer|exists:genres,id',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Поле названия обязательно для заполнения.',
            'developer.required' => 'Поле студии разработчика обязательно для заполнения.',
            'genres.required' => 'Необходимо указать хотя бы один жанр.',
            'genres.*.exists' => 'Выбранный жанр не существует.',
        ];
    }
}
