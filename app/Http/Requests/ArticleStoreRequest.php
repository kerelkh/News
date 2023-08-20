<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'unique:articles,title'],
            'caption' => ['required'],
            'body' => ['required'],
            'author' => ['required'],
            'category' => ['required'],
            'tags' => ['required'],
            'publish_date' => ['required'],
            'image' => ['image'],
        ];
    }
}
