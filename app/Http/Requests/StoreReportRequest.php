<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
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
            'user_id' => 'exists:App\Models\User,id',
            'nama_pelapor' => 'required|string|min:3|max:255',
            'nomor_hp' => 'required|numeric',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'tanggal_kegiatan' => 'required|date',
            'jenis_kegiatan' => 'required|string|min:3|max:255',
            'jenis_pelanggaran' => 'nullable|array',
            'jenis_sanksi' => 'required|in:Pidana,Administratif',
            'jumlah_pelanggar' => 'nullable|numeric',
            'sanksi_administratif' => 'nullable|array',
            'denda_administratif' => 'nullable|string|min:2|max:255',
            'sanksi_pidana' => 'nullable|in:1,2',
            'denda_pidana' => 'nullable|string|min:2|max:255',
            'lama_kurungan' => 'nullable|string|min:2|max:255',
            'foto_dokumentasi' => 'mimes:jpg,jpeg,png,mp4,ogx,oga,ogv,ogg,webm|max:20000',
        ];
    }
}
