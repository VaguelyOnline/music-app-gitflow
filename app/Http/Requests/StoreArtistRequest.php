<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArtistRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' =>           'required|min:1|max:300',
            'description' =>    'required|min:3|max:16000',
            'image' =>          'required|url'
        ];
    }
}
