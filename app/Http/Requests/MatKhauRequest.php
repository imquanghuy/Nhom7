<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatKhauRequest extends FormRequest
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
            'password'=>'bail|required|confirmed|min:8|max:32',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Không được để trống',
            'password.min'=>'Mật khẩu phải có ít nhất 8 ký tự',
            'password.max'=>'Mật khẩu tối đa 32 ký tự',
            'confirmed'=>'Mật khẩu không khớp'
        ];
    }
}
