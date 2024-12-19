<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
            'name' => 'required|max:150',
            'email' => 'required|max:150',
            'message' => 'required',
        ];
        if (config('app.enable_captcha_on_contact_us') == true && config('app.enable_captcha') == true) {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }
        return $rules;
    }
}
