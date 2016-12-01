<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {

        $this->sanitize();

        switch (strtoupper($this->getMethod())) {
            case 'POST':
                return [
                    'name' => 'required|string|min:3|max:255|unique:' . Category::getTableName() . ',name',
                    'description' => 'required|string|min:3',
                ];

            case 'PUT':
                return [
                    'name' => 'present|string|min:3|max:255|unique:' . Category::getTableName() . ',name',
                    'description' => 'present|string|min:3',
                ];

            default:
                throw new \InvalidArgumentException('Cannot process rules for HTTP method "' . $this->getMethod() . '"');
        }
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            /*'name' => trans('name'),
            'description' => trans('description'),*/
        ];
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

        $input['name'] = filter_var(isset($input['name']) ? $input['name'] : null, FILTER_SANITIZE_STRING);
        $input['description'] = filter_var(isset($input['description']) ? $input['description'] : null, FILTER_SANITIZE_STRING);
        $this->replace($input);
    }
}