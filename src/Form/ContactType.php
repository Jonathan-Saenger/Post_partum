<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'contraints' => [
                    new NotBlank([
                        'message' => 'Merci de préciser votre nom.']),
                    new Length([
                        'min' => "2",
                        'minMessqage' => 'Veuillez saisir un minimum de {{ limite }} caractères',
                        'max' => "15",
                        'maxMessage' => 'Vous avez dépassé le nombre de caractères limités',
                    ]),
                    new Regex([
                        'pattern' => '/^[^\-\\\/\*]*$/',
                        'message' => 'Vous avez employé un caractère non autorisé, merci de le supprimer'
                    ]),
                ]
            ])
            ->add('prénom', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Merci de préciser votre prénom']),
                    new Length([
                        'min' => "5",
                        'minMessqage' => 'Veuillez saisir un minimum de caractère',
                        'max' => "15",
                        'maxMessage' => 'Vous avez dépasser le nombre de caractères limités',
                    ]),
                    new Regex([
                        'pattern' => '/^[^\-\\\/\*]*$/',
                        'message' => 'Vous avez employé un caractère non autorisé, merci de le supprimer'
                    ])
                ]
            ])
            ->add('numéro de téléphone', TelType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Merci de saisir un numéro de téléphone'])
                ],
                'invalid_message' => 'Veuillez entrer un numéro de téléphone valide.'
            ])
            -> add('Email', EmailType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Veuillez saisir votre Email']),
                    new Email (['message' => 'Veuillez entrer une adresse e-mail valide.'])
                ]
            ])
            ->add('Message', TextareaType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir votre message'])
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
