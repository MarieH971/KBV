<?php

namespace App\Enum;

enum EquipementType: string
{
    case BALLON = 'ballon';
    case KIT_DE_JEU = 'kit de jeu';

    /**
     * Converts the enum cases into an associative array.
     *
     * @return array<string, string> An array where keys are the enum names and values are the enum values.
     */
    public static function casesAsArray(): array
    {
        $cases = [];
        foreach (self::cases() as $case) {
            $cases[$case->name] = $case->value;
        }
        return $cases;
    }
}
