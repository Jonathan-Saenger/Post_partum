<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class FormulaireContactType extends AbstractType
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
            ->add('telephone', IntegerType::class)
            ->add('message', TextareaType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Veuillez saisir votre message.']),
                    new Length([
                        'min' => 10,
                        'minMessage' => 'Votre message ne peut pas comporter moins de {{ limit }} caractères.',
                        'max' => 1500,
                        'maxMessage' => 'Votre message ne peut pas comporter plus de {{ limit }} caractères.',
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
            'data_class' => Contact::class,
            'csrf_protection' => true,
        ]);
    }
}
