<?php

namespace Modules\Perpustakaan\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'user_id' => ['required', Rule::unique('members', 'user_id')->whereNull('deleted_at')]
        ];
    }

    public function messages()
    {
      return [
        'user_id.required'  => 'Nama Siswa/i tidak boleh kosong.',
        'user_id.unique'    => 'Nama Siswa/i sudah ditambahkan.'
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
