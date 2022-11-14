<?php

namespace App\Http\Requests\Website;

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

    public function rules()
    {
        return request()->isMethod('PUT') || request()->isMethod('PATCH') ? $this->onUpdate() : $this->onCreate() ;
    }
    public function onCreate()
    {
        return [
            'content' => ['required','string'],
        ];
    }
    public function onUpdate()
    {
        return [
            'content' => ['required','string'],
        ];
    }
    public function messages()
    {
        return [
            'content.required' => trans('body is required'),
            'content.string' => trans('content must be text'),
        ];
    }
}
