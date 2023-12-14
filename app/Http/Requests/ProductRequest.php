<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id'=>[
                'required',
                'integer'
            ],
            'name'=>[
                'required',
                'string'
            ],

            'slug'=>[
                'required',
                'string'
            ],

            'brand'=>[
                'nullable',
                'string'
            ],

            'original_price'=>[
                'required',
                'integer'
            ],

            'selling_price'=>[
                'required',
                'integer'
            ],
            'quantity'=>[
                'required',
                'integer'
            ],
            'small_description'=>[
                'nullable',
            ],

            'description'=>[
                'nullable',
                'string'
            ],


            'image' => [

            ],

            'meta_title'=>[
                'required',
                'string'
            ],

            'meta_description'=>[
                'required',
                'string'
            ],

            'meta_keyword'=>[
                'required',
                'string'
            ],
        ];
    }
}
