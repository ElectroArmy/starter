<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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

        $this->merge(['is_downloadable' => $this->get('is_downloadable', false)]);

        return [
            'name'        => 'required',
            'platform'    => 'required',
            'description' => 'required',
            'sku'         => 'required|unique:products,sku,' . $this->get('id'),
            'price'       => 'required|numeric',
            'image'       => 'required_without:has_image|mimes:png',
            'is_downloadable' => 'boolean'

        ];
    }
}