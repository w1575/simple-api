<?php

namespace App\Rules;

use App\Components\EquipmentTypeMask\EquipmentTypeMaskInterface;
use App\Models\EquipmentType;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SNMaskRule implements ValidationRule
{
    protected ?string $regex = null;

    public function __construct(?string $typeId, protected EquipmentTypeMaskInterface $equipmentTypeMask)
    {
        if ($typeId !== null) {
            $model = EquipmentType::whereId($typeId)->first();
            if ($model === null) {
                return;
            }
            $equipmentTypeMask->setMask($model->sn_mask);
            $this->regex = $this->equipmentTypeMask->generateMaskRegulaExpression();
        }
    }

    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($this->regex !== null && !preg_match($this->regex, $value)) {
            $fail("{$attribute} has wrong serial number pattern");
        }
    }
}
