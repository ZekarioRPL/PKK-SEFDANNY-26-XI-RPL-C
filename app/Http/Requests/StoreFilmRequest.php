<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFilmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|file|max:5024|',
            'rating' => 'required|file|max:5024|',
            'tanggalPenayangan' => 'required|file|max:5024|',
            'tanggalPenutupan' => 'required|file|max:5024|',
            'duration' => 'required|file|max:5024|',
            'harga' => 'required|file|max:5024|',
            'jamPenayangan' => 'required|file|max:5024|',
            'deskripsi' => 'required|file|max:5024|',
            'file' => 'required|file|max:5024|',
        ];
    }
}
