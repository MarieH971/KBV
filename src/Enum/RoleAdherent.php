<?php

namespace App\Enum;

enum RoleAdherent: string
{
    case ADMINISTRATEUR_LICENCIE = 'Administrateur_licencié';
    case LICENCIE = 'Licencié';


    public static function casesAsArray(): array
    {
        $cases = [];
        foreach (self::cases() as $case) {
            $cases[$case->name] = $case->value;
        }
        return $cases;
    }
}
