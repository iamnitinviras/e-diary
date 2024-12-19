<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'min:2'],
            'email' => ['required', 'string', 'max:255', 'min:2'],
            'comment' => ['required'],
        ];
        if (config('app.enable_captcha_on_comments') == true && config('app.enable_captcha') == true) {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }
        return $rules;
    }
    public function messages()
    {

        $your_name=trans('system.fields.your_name');
        $comment=trans('system.fields.comment');
        $your_email=trans('system.fields.your_email');
        $messages = [
            "name.required" => __('validation.required', ['attribute' => $your_name]),
            "comment.required" => __('validation.required', ['attribute' => $comment]),
            "email.required" => __('validation.required', ['attribute' => $your_email]),
        ];
        return $messages;
    }
}
