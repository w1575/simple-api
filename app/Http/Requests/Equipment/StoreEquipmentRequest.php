<?php

namespace App\Http\Requests\Equipment;

use App\Models\EquipmentType;
use App\Rules\SNMaskRule;
use Illuminate\Contracts\Validation\Rule as ContractRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array<string, ContractRule|array|string>
     */
    public function rules(): array
    {
        $typeTable = (new EquipmentType)->getTable();

        return [
            'items' => ['required', 'array'],
            'items.*.equipment_type_id' =>  ['bail', 'required', Rule::exists($typeTable, 'id')],
            'items.*.serial_number' => [ Rule::forEach(function(null|string $value, string $attribute) {
                    $equipmentTypeId = $this->input("items.$attribute.equipment_type_id");

                    return ['bail', new SNMaskRule($equipmentTypeId),'required',];
                })
            ],
            'items.*.comment' => ['min:3', 'max:255'],
        ];
    }
}
