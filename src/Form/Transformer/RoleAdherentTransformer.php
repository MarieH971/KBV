<?php


namespace App\Form\Transformer;


use App\Enum\RoleAdherent;
use Symfony\Component\Form\DataTransformerInterface;

class RoleAdherentTransformer implements DataTransformerInterface
{
    public function transform($value): string
    {
        // Transformation dans le sens formulaire -> entité
        return $value ? $value->value : '';
    }

    public function reverseTransform($value): ?RoleAdherent
    {
        // Transformation dans le sens entité -> formulaire
        return $value ? RoleAdherent::from($value) : null;
    }
}
