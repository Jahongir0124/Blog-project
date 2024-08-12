<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function messages(): array
    {
        
        return [
            'title.required' => 'Sarlavha maydoni to\'ldirilishi shart!',
            'shortContent.required' => 'Bu maydon to\'ldirilishi shart!',
            'content.required' => 'Bu maydon to\'ldirilishi shart!'
        ];
    }
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'shortContent' => 'required',
            'content' => 'required',
            'photo' => 'required|image'
        ];
    }
}
