<?php

namespace Modules\PPDB\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataMuridRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required',
            'email'         => 'required|email',
            'tempat_lahir'  => 'required',
            'tgl_lahir'     => 'required',
            'agama'         => 'required',
            'telp'          => 'required|numeric',
            'whatsapp'      => 'required|numeric',
            'alamat'        => 'required',
            'asal_sekolah'  => 'required',
            'nik' => 'required|numeric',
            'nama_panggilan' => 'required|string',
            'jenis_kelamin' => 'in:laki-laki,perempuan',
            'alamat_kk' => 'required|string',
            'anak_ke' => 'required|numeric',
            'jumlah_saudara' => 'required|numeric',
            'kewarganegaraan' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Kolom nama harus diisi.',
            'email.required' => 'Kolom email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'tempat_lahir.required' => 'Kolom tempat lahir harus diisi.',
            'tgl_lahir.required' => 'Kolom tanggal lahir harus diisi.',
            'agama.required' => 'Kolom agama harus diisi.',
            'telp.required' => 'Kolom telepon harus diisi.',
            'telp.numeric' => 'Kolom telepon harus berupa angka.',
            'whatsapp.required' => 'Kolom whatsapp harus diisi.',
            'whatsapp.numeric' => 'Kolom whatsapp harus berupa angka.',
            'alamat.required' => 'Kolom alamat harus diisi.',
            'asal_sekolah.required' => 'Kolom asal sekolah harus diisi.',
            'nik.required' => 'Kolom NIK harus diisi.',
            'nik.numeric' => 'Kolom NIK harus berupa angka.',
            'nama_panggilan.required' => 'Kolom nama panggilan harus diisi.',
            'nama_panggilan.string' => 'Kolom nama panggilan harus berupa teks.',
            'jenis_kelamin.in' => 'Pilih salah satu jenis kelamin: laki-laki atau perempuan.',
            'alamat_kk.required' => 'Kolom alamat KK harus diisi.',
            'alamat_kk.string' => 'Kolom alamat KK harus berupa teks.',
            'anak_ke.required' => 'Kolom anak ke harus diisi.',
            'anak_ke.numeric' => 'Kolom anak ke harus berupa angka.',
            'jumlah_saudara.required' => 'Kolom jumlah saudara harus diisi.',
            'jumlah_saudara.numeric' => 'Kolom jumlah saudara harus berupa angka.',
            'kewarganegaraan.required' => 'Kolom kewarganegaraan harus diisi.',
            'kewarganegaraan.string' => 'Kolom kewarganegaraan harus berupa teks.'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
