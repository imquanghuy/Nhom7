<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRegisterRequest extends FormRequest
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
            'email'=>'bail|required|min:10|max:255',
            'password'=>'bail|required|confirmed|min:8|max:32',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Không được để trống',
            'email.min'=>'Emai phải có it nhất 10 ký tự',
            'password.min'=>'Mật khẩu phải có ít nhất 8 ký tự',
            'email.max'=>'Email tối đa 255 ký tự',
            'password.max'=>'Mật khẩu tối đa 32 ký tự',
            'confirmed'=>'Mật khẩu không khớp',
        ];
    }
}
