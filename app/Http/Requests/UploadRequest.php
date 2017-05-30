<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->check()){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'proof_name' => 'required',
            'images' => 'required',
        ];
        $photos = count($this->input('images'));
        foreach(range(0, $photos) as $index) {
            $rules['images.' . $index] = 'image|mimes:jpg,jpeg,bmp,png|max:2048';
        }

        return $rules;
    }
}
