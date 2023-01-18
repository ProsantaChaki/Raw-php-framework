<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddInventoryItemRequest
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
            'item_id' => 'required|max:255',
            'type' => 'required',
            'amount' => 'required|integer',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'item_id.required' => 'An Id is required',
            'item_id.unique' => 'An Unique Id is required',
            'type.required' => 'Item Type is required',
            'amount.required' => 'Item Amount is required',
            'amount.integer' => 'Item Amount must be a valid number',
        ];
    }
}
