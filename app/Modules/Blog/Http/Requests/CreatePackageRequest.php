<?php

namespace App\Modules\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePackageRequest extends FormRequest
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
            'title'=>'required',
            'service_id'=>'required',
        ];
    }
}
