<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'member_id' => ['required', 'string', 'max:20', 'unique:members,member_id'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama member wajib diisi',
            'member_id.required' => 'ID member wajib diisi',
            'member_id.unique' => 'ID member sudah dipakai',
        ];
    }
}
