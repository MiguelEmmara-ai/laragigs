<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreListingsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:100',
            'company' => 'required|unique:listings',
            'location' => 'required|max:100',
            'email' => 'required|email',
            'website' => 'required|max:100',
            'tags' => 'required',
            'description' => 'required',
        ];
    }
}
