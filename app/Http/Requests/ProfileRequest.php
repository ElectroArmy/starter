<?php

namespace App\Http\Requests;



/**
 * Class ProfileRequest
 * @package App\Http\Requests
 */
class ProfileRequest extends Request
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
            'address' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'country' => 'required',
            'phone' => 'phone:GB',
            'bio'       => 'required',
            'twitter_username' => 'required',
            'github_username' => 'required'

        ];
    }
}