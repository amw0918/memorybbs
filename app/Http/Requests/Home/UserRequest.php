<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserRequest extends FormRequest
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
            'nickname' =>'between:3,20|unique:users,nickname,'.Auth::id(),
            'intro' =>'max:80',
            'email' =>'required|email|unique:users,email,'.Auth::id(),
            'mobile' =>'nullable|regex:/^1[34578]\d{9}$/',
            'avatar' => 'mimes:jpeg,png,jpg,gif|dimensions:min_width=200,min_height=200'
        ];
    }
}
