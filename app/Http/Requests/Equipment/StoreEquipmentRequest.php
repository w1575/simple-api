<?php

namespace App\Http\Requests\Equipment;

use App\Models\EquipmentType;
use App\Rules\SNMaskRule;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Exists;

class StoreEquipmentRequest extends FormRequest
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
            'items.*.equipment_type_id' =>  [Exists::class, (new EquipmentType)->getTable()],
            'items.*.serial_number' => [(new SNMaskRule($this->input('equipment_type_id')))],
            'items.*.comment' => ['max:255'],
        ];
    }
}
