<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, [
            'constraints' => [
                new Length([
                    'min' => 2,
                    'minMessage' => 'Veuillez saisir un minimum de {{ limit }} caractères',
                    'max' => 15,
                    'maxMessage' => 'Vous avez dépassé le nombre de caractères limités',
                ]),
                new Regex([
                    'pattern' => '/^[a-zA-Z-]+$/',
                    'match' => true,
                    'message' => 'Vous avez employé un caractère non autorisé, merci de le supprimer'
                ]),
            ]
        ])
        ->add('prenom', TextType::class, [
            'constraints' => [
                new Length([
                    'min' => 5,
                    'minMessage' => 'Veuillez saisir un minimum de caractère',
                    'max' => 15,
                    'maxMessage' => 'Vous avez dépasser le nombre de caractères limités',
                ]),
                new Regex([
                    'pattern' => '/^[a-zA-Z-]+$/',
                    'match' => true,
                    'message' => 'Vous avez employé un caractère non autorisé, merci de le supprimer'
                ])
            ]
        ])
            ->add('email')
            ->add('Password', PasswordType::class, [
                                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Regex([
                        'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\/:,])[A-Za-z\d@$!%*?&\/:,]{8,}$/',
                        'message' => 'Votre Password doit contenir au moins une lettre majuscule, un chiffre, un caractère spécial et 8 caractères.',
                    ]),
                ],
            ])
            ->add('acceptTermes', CheckboxType::class, [
                'mapped' => false,
                'label' => 'En soumettant ce formulaire, j’accepte que mes informations soient utilisées exclusivement dans le cadre de ma demande de contact.',
                'constraints' => [
                    new IsTrue(['message' => 'Vous devez accepter les conditions d\'utilisation pour continuer']),
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
