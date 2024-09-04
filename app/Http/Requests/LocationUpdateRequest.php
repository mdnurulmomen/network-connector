<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationUpdateRequest extends FormRequest
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
            'name' => [
                'required', 'string', 'max:255', 'unique:locations,name,'.$this->route('location')->id
            ],

            'latitude' => [
                'required', 'numeric', 'unique:locations,latitude,'.$this->route('location')->id
            ],

            'longitude' => [
                'required', 'numeric', 'unique:locations,longitude,'.$this->route('location')->id
            ],
        ];
    }
}
