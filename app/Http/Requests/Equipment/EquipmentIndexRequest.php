<?php

namespace App\Http\Requests\Equipment;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EquipmentIndexRequest extends FormRequest
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
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'equipment_type_id' => ['min:3'],
            'serial_number' => ['min:3'],
            'comment' => ['min:3'],
        ];
    }
}
