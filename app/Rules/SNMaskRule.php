<?php

namespace App\Rules;

use App\Models\EquipmentType;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class SNMaskRule implements ValidationRule
{

    protected string $regex;

    public function __construct(int $typeId)
    {
        $this->regex = EquipmentType::whereId($typeId)->firstOrFail()->getSNMaskRegx();
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
