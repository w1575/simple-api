<?php

namespace App\Http\Requests\Equipment;

use App\Components\EquipmentTypeMask\EquipmentTypeMaskInterface;
use App\Models\EquipmentType;
use App\Rules\SNMaskRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEquipmentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $typeTable = (new EquipmentType())->getTable();
        return [
            'equipment_type_id' =>  ['bail', 'required', Rule::exists($typeTable, 'id')],
            'serial_number' => ['bail', 'required', 'string', new SNMaskRule($this->get('equipment_type_id'), app(EquipmentTypeMaskInterface::class))],
            'comment' => ['min:3', 'max:255'],
        ];
    }
}
