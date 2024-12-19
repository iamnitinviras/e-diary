<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotesRequest extends FormRequest
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
        $rules = [
            'category_id' => ['required'],
            'title' => ['required', 'string', 'max:255', 'min:2'],
            'slug' => ['required','unique:notes,slug'],
            'description' => ['required'],
        ];
        if (isset($this->blog)){
            $rules['slug'] = ['required','unique:notes,slug,' . $this->blog->id];
        }
        return $rules;
    }
}
