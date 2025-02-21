<?php

<<<<<<< HEAD
    namespace App\Enum;
    enum Level: string
    {
        case LEVEL_BEGINNER = 'débutant';
        case LEVEL_INTERMEDIATE = 'intermédiaire';
        case LEVEL_ADVANCED = 'Avancé';

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
=======
namespace App\Enum;


<<<<<<<< HEAD:src/Enum/UserRole.php
enum UserRole: string
========
enum Level: string
>>>>>>>> abf2888370c1fbac7670cabf82329af71d0e933f:src/Enum/Level.php
{
    case BEGINNER = 'Débutant';
    case INTERMEDIATE = 'Intermédiaire';
    case ADVANCED = 'Avancé';

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
>>>>>>> abf2888370c1fbac7670cabf82329af71d0e933f
