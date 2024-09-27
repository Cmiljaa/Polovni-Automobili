<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'brand' => 'required|string|max:100|in:' . implode(',', array_keys(config('car.brands'))),
            'price' => 'required|numeric|min:0|max:1000000',
            'fuel' => 'required|string|in:' . implode(',', config('car.fuels')),
            'year' => 'required|integer|digits:4|min:1886',
            'mileage' => 'required|integer|min:0|max:2000000',
            'power' => 'required|integer|min:1|max:10000',
            'model' => 'required|string',
            'body_type' => 'required|string|in:' . implode(',', config('car.body_types')),
            'transmission' => 'required|string|in:' . implode(',', config('car.transmissions')),
            'drive_system' => 'required|string|in:' . implode(',', config('car.drive_systems')),
            'cubic_capacity' => 'required|integer|min:100|max:10000',
            'number_of_seats' => 'required|integer|min:2|max:7',
            'door_count' => 'required|integer|min:2|max:5',
            'images' => 'required|array|max:10',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ];
    }
}
