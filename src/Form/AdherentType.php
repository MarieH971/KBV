<?php

namespace App\Form;

use App\Entity\Adherent;
use App\Enum\Niveau;
use App\Enum\RoleAdherent;
use App\Form\Transformer\RoleAdherentTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdherentType extends AbstractType
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
                'niveau',
                ChoiceType::class,
                [
                    'choices' => [
                        'Débutant' => Niveau::DEBUTANT,
                        'Loisir' => Niveau::LOISIR,
                        'Avancé' => Niveau::AVANCE,
                    ],
                ]
            )
            ->add('roleAdherent', ChoiceType::class, [
                'choices' => [
                    'Licencié' => RoleAdherent::LICENCIE->value,
                    'Administrateur_Licencié' => RoleAdherent::ADMINISTRATEUR_LICENCIE->value,
                ],
                'expanded' => true,  // Affichage sous forme de boutons radio
                'multiple' => false, // Un seul choix possible
            ])
            ->get('roleAdherent')
            ->addModelTransformer(new RoleAdherentTransformer()) // Ajouter le transformateur
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adherent::class,
        ]);
    }
}
