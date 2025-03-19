<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSiswaRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required',
            'class' => 'required',
            'address' => 'required',
            'gender' => 'required|in:L,P',
            'status' => 'required|in:Active,Tidak Aktif',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    /**
     * Get the custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'phone.required' => 'Nomor telepon wajib diisi.',
            'class.required' => 'Kelas wajib diisi.',
            'address.required' => 'Alamat wajib diisi.',
            'gender.required' => 'Jenis kelamin wajib dipilih.',
            'gender.in' => 'Jenis kelamin harus "L" (Laki-laki) atau "P" (Perempuan).',
            'status.required' => 'Status wajib dipilih.',
            'status.in' => 'Status harus "Aktif" atau "Tidak Aktif".',
            'photo.image' => 'File foto harus berupa gambar.',
            'photo.mimes' => 'Format foto harus jpeg, png, jpg, gif, atau svg.',
            'photo.max' => 'Ukuran foto tidak boleh lebih dari 2MB.',
        ];
    }
}