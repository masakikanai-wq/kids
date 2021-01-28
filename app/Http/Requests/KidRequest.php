<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KidRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // ここをtrueに変更する理由について後ほど確認する
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
            //
            // 'user_id' => 'required',
            'name' => 'required',
            'birthday' => 'required',
            'sex' => 'required',
            'father' => 'required',
            'mother' => 'required'
        ];
    }
}
