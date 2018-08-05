<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComment extends FormRequest
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
            'user_name' => 'required',
            'email' => 'required|email',
            'text' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => 'Поле "Имя" обязательное',
            'email.required'  => 'Поле Email обязательное',
            'email.email'  => 'Поле Email должно быть почтовым ящиком',
            'text.required'  => 'Поле Сообщение обязательное',
        ];
    }
}
