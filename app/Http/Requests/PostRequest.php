<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        $this->sanitize();

        return [
            'name' => 'required|string|min:5|min:255',
            'description' => 'required|string|min:5|min:255',
            'published' => 'date',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        /*return [
            'name' => trans(''),
            'description' => trans(''),
            'published' => trans(''),
        ];*/
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function sanitize()
    {
        $input = $this->all();


        $this->replace($input);
    }
}