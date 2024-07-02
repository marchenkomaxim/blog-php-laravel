<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Данные должны соответствовать строчному типу',
            'content.required' => 'Это поле необходимо для заполнения',
            'content.string' => 'Данные должны соответствовать строчному типу',
            'preview_image.file' => 'Файл не подхдит под формат картинки',
            'preview_image.required' => 'Необходимо выбрать файл',
            'main_image.required' => 'Необходимо выбрать файл',
            'main_image.file' => 'Файл не подхдит под формат картинки',
            'category_id.required' => 'Необходимо выбрать категорию',
            'category_id.integer' => 'Неверный тип данных',
            'category_id.exists' => 'Такой категории нет',
            'tag_ids.array' => 'Необходимо отправить массив данных',

        ];
    }
}
