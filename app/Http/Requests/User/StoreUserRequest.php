<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
            'user_id' => auth()->user()->id,
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
            'name' => ['required', 'min:3', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' =>  [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
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
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama minimal 3 huruf',
            'name.max' => 'Nama maksimal 255 huruf',
            'username.required' => 'Username tidak boleh kosong',
            'username.min' => 'Username minimal 3 huruf',
            'username.max' => 'Username maksimal 255 huruf',
            'username.unique' => 'Username sudah digunakan silahkan pilih yang lain',
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Diisi dengan alamat email yang valid',
            'email.unique' => 'Email sudah digunakan silahkan pilih yang lain',
            'password.required' => 'Password Wajib Diisi',
            'password.min' => 'Password minimal 8 karakter',
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
