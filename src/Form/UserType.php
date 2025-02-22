<?php

namespace App\Form;

use App\Entity\User;
use App\Enum\Level;
use App\Enum\UserRole;
use App\Form\Transformer\UserRoleTransformer;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastName', TextType::class)
            ->add('firstName', TextType::class)
            
            ->add('telephone', TextType::class, ['required' => false])
            ->add('photo', FileType::class, ['required' => false])
            ->add('email', EmailType::class)
            ->add('password', passwordType::class)
            ->add(
                'dateOfBirth',
                DateType::class,
                ['widget' => 'single_text'],
                null
            )
            ->add('registrationDate', null, [
                'widget' => 'single_text',
            ])
            ->add('licenseNumber', TextType::class)
            ->add('licenseExpirationDate', DateType::class, ['widget' => 'single_text'], null)
            ->add(
                'Level',
                ChoiceType::class,
                [
                    'choices' => [
                        'Débutant' => Level::LEVEL_BEGINNER,
                        'Loisir' => Level::LEVEL_INTERMEDIATE,
                        'Avancé' => Level::LEVEL_ADVANCED,
                    ],
                ]
            )
            ->add('UserRole', ChoiceType::class, [
                'choices' => [
                    'Licencié' => UserRole::ROLE_USER->value,
                    'Admin' => UserRole::ROLE_ADMIN->value,
                ],
                'expanded' => true,  // Affichage sous forme de boutons radio
                'multiple' => false, // Un seul choix possible
            ])
            ->get('UserRole')
            ->addModelTransformer(new UserRoleTransformer()) // Ajouter le transformateur
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}