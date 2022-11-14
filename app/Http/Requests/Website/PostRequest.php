<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => ['required','string'],
            'content' => ['required','string'],
        ];
    }
    public function onUpdate()
    {
        return [
            'title' => ['required','string'],
            'content' => ['required','string'],
        ];
    }
    public function messages()
    {
        return [
            'title.required' => trans('title is required'),
            'title.string' => trans('title is text'),
            'content.required' => trans('body is required'),
            'content.string' => trans('content must be text'),
        ];
    }
}
