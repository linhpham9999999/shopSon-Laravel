<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'bail|required|min:10|max:40',
            'con_content' => 'bail|required|min:10|max:100',
            'message' => 'bail|required|min:10|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập Tên của bạn',
            'name.min' => 'Tên phải có độ dài từ 10 đến 255 ký tự',
            'name.max' => 'Tên phải có độ dài từ 10 đến 255 ký tự',
            'email.required' => 'Vui lòng nhập Email của bạn',
            'email.min' => 'Email phải có độ dài từ 10 đến 40 ký tự',
            'email.max' => 'Email phải có độ dài từ 10 đến 40 ký tự',
            'con_content.required' => 'Vui lòng nhập Chủ đề liên lạc',
            'con_content.min' => 'Chủ đề phải có độ dài từ 10 đến 100 ký tự',
            'con_content.max' => 'Chủ đề phải có độ dài từ 10 đến 100 ký tự',
            'message.required' => 'Vui lòng nhập Nội dung cần liên lạc',
            'message.min' => 'Nội dung phải có độ dài từ 10 đến 500 ký tự',
            'message.max' => 'Nội dung phải có độ dài từ 10 đến 500 ký tự',
        ];
    }
}
