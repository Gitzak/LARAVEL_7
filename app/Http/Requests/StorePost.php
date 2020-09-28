<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
            'title'   => 'required|min:3',
            'content' => 'required|min:3',
            // 'picture' => 'image|mimes:jpeg,jpg,png,svg,gif|max:1024|dimensions:min_height=720',
            'picture' => 'image|mimes:jpeg,jpg,png,svg,gif',
        ];
    }
}
