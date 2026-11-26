<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $required = $this->isMethod('PATCH') ? 'sometimes' : 'required';

        return [
            'title' => [$required, 'string', 'max:255',
                Rule::unique('media', 'title')->ignore($this->route('media'))],
            'type' => [$required, Rule::in(['Anime', 'Drama', 'Manga', 'Light Novel'])],
            'year' => [$required, 'integer', 'min:1900', 'max:2100'],
            'genres' => [$required, 'array', 'min:1'],
            'genres.*' => ['string'],
            'rating' => ['nullable', 'numeric', 'between:0,10'],
            'episodes' => ['nullable', 'integer', 'min:1'],
            'chapters' => ['nullable', 'integer', 'min:1'],
            'volumes' => ['nullable', 'integer', 'min:1'],
            'country' => ['nullable', 'string', 'max:255'],
            'author' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul media wajib diisi',
            'title.unique' => 'Judul media sudah ada',
            'type.in' => 'Jenis media harus Anime, Drama, Manga, atau Light Novel',
            'rating.between' => 'Rating harus antara 0 dan 10',
        ];
    }
}
