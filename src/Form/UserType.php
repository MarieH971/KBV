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
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('adresse', TextType::class)
            ->add('telephone', TextType::class, ['required' => false])
            ->add('photo', FileType::class, ['required' => false])
            ->add('email', EmailType::class)
            ->add('mot_de_passe', PasswordType::class)
            ->add(
                'date_de_naissance',
                DateType::class,
                ['widget' => 'single_text'],
                null
            )
            ->add('date_inscription', null, [
                'widget' => 'single_text',
            ])
            ->add('numero_licence', TextType::class)
            ->add('date_expiration_licence', DateType::class, ['widget' => 'single_text'], null)
            ->add(
                'Level',
                ChoiceType::class,
                [
                    'choices' => [
                        'Débutant' => Level::BEGINNER,
                        'Loisir' => Level::INTERMEDIATE,
                        'Avancé' => Level::ADVANCED,
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