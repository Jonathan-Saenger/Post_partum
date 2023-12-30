<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\IsFalse;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de préciser votre nom.']),
                    new Length([
                        'min' => "2",
                        'minMessage' => 'Veuillez saisir un minimum de {{ limite }} caractères',
                        'max' => "15",
                        'maxMessage' => 'Vous avez dépassé le nombre de caractères limités',
                    ]),
                    new Regex([
                        'pattern' => '/^[^\-\\\/\*]*$/',
                        'message' => 'Vous avez employé un caractère non autorisé, merci de le supprimer'
                    ]),
                ]
            ])
            ->add('prenom', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Merci de préciser votre prénom']),
                    new Length([
                        'min' => "5",
                        'minMessage' => 'Veuillez saisir un minimum de caractère',
                        'max' => "15",
                        'maxMessage' => 'Vous avez dépasser le nombre de caractères limités',
                    ]),
                    new Regex([
                        'pattern' => '/^[^\-\\\/\*]*$/',
                        'message' => 'Vous avez employé un caractère non autorisé, merci de le supprimer'
                    ])
                ]
            ])
            ->add('telephone', TelType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Merci de saisir un numéro de téléphone'])
                ],
                'invalid_message' => 'Veuillez entrer un numéro de téléphone valide.'
            ])
            -> add('email', EmailType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Veuillez saisir votre Email']),
                    new Email (['message' => 'Veuillez entrer une adresse e-mail valide.'])
                ]
            ])
            ->add('message', TextareaType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir votre message'])
                ]
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
            'csrf_protection' => true,
            'action' => '/submit',
        ]);
    }
}
