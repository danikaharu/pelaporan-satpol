<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->user_id,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['exists:App\Models\User,id'],
            'height' => ['nullable', 'min:2', 'max:255'],
            'weight' => ['nullable', 'min:2', 'max:255'],
            'hobby' => ['nullable', 'min:2', 'max:255'],
            'job' => ['nullable', 'in:1,2'],
            'photo' => ['nullable', 'mimes:jpeg,jpg,png', 'max:1500'],
        ];
    }

    public function messages()
    {
        return [
            'height.min' => 'Tinggi badan minimal 2 huruf',
            'height.max' => 'Tinggi badan maksimal 255 huruf',
            'weight.min' => 'Berat badan minimal 2 huruf',
            'weight.max' => 'Berat badan maksimal 255 huruf',
            'hobby.min' => 'Hobby minimal 3 huruf',
            'hobby.max' => 'Hobby maksimal 255 huruf',
            'job.in' => 'Pilihan tidak ada dalam daftar',
            'photo.mimes' => 'File yang diupload bukan gambar',
            'photo.max' => 'Ukuran maksimal 1.5 MB',
        ];
    }
}
