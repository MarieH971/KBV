<?php

namespace App\Enum;


enum Session: string
{
    case SESSION1 = 'session1 Avancé/Loisir Vendredi 18h/20h Terrain1 CREPS';
    case SESSION2 = 'session2 Avancé/Loisir Dimanche 08h30/11h30 Terrain3 CANELLA';
    case SESSION3 = 'session3 Débutant Vendredi 18h/20h Terrain2 CREPS';


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
