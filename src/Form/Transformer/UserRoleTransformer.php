<?php

namespace App\Form\Transformer;



use App\Enum\UserRole;
use Symfony\Component\Form\DataTransformerInterface;

class UserRoleTransformer implements DataTransformerInterface
{
    public function transform($value): string
    {
        // Transformation dans le sens formulaire -> entité
        return $value ? $value->value : '';
    }

    public function reverseTransform($value): ?UserRole
    {
        // Transformation dans le sens entité -> formulaire
        return $value ? UserRole::from($value) : null;
    }
}