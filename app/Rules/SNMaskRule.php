<?php

namespace App\Rules;

use App\Components\EquipmentTypeMask\EquipmentTypeMaskInterface;
use App\Components\EquipmentTypeMask\Exceptions\InvalidEquipmentTypeMaskValueException;
use App\Models\EquipmentType;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class SNMaskRule implements ValidationRule
{
    protected string $regex;

    public function __construct(int $typeId, protected EquipmentTypeMaskInterface $equipmentTypeMask)
    {
        $model = EquipmentType::whereId($typeId)->firstOrFail();
        $equipmentTypeMask->setMask($model->sn_mask);
        $this->regex = $this->equipmentTypeMask->generateMaskRegulaExpression();
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
        if (!preg_match($this->regex, $value)) {
            $fail("{$attribute} has wrong serial number pattern");
        }
    }
}
