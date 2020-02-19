<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBathsusersRequest extends FormRequest
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
            'bath_id' => 'required',
            'photo' => 'nullable|mimes:png,jpg,jpeg,gif',
            'time_entry' => 'required',
            'time_exit' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'longitude' => 'company',
        ];
    }
}
