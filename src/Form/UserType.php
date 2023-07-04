<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class, [
                'label' => 'Email',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'attr' => [
                    'class'=> 'form-control',
                    'minlength' => 6,
                    'maxlength' => 180,
                    'minMessage' => 'Votre email est trop court',
                    'maxMessage' => 'Votre email est trop long',
                ],
                'constraints' => [
                    new Assert\NotBlank(message: 'L\'email doit être indiquer'),
                    new Assert\Length(['min' => 6, 'max' => 180]),
                ]
            ])
            ->add('roles', CollectionType::class, [
                'entry_type' => ChoiceType::class,
                'entry_options' => [
                    'choices' => [
                        'ROLE_CONSULTANT'=> 'ROLE_CONSULTANT',
                        'ROLE_RECRUTEUR'=> 'ROLE_RECRUTEUR',
                        'ROLE_USER'=> 'ROLE_USER',
                    ]
                ]
            ])
            ->add('password')
            ->add('name', TextType::class, [
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'attr' => [
                    'class'=> 'form-control',
                    'minlength' => 4,
                    'maxlength' => 255,
                    'minMessage' => 'Votre nom doit compter au minimum {{ limit }} caractères',
                    'maxMessage' => 'Votre nom doit compterau maximum {{ limit }} caractères',
                ],
                'constraints' => [
                    new Assert\NotBlank(message: 'Un nom doit être indiquer'),
                    new Assert\Length(['min' => 4, 'max' => 255]),
                ]
            ])
            ->add('location', TextType::class, [
                'label' => 'Ville',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'attr' => [
                    'class'=> 'form-control',
                    'minlength' => 4,
                    'maxlength' => 150,
                    'minMessage' => 'Votre nom de ville est trop court',
                    'maxMessage' => 'Votre nom de ville est trop long',
                ],
                'constraints' => [
                    new Assert\NotBlank(message: 'le lieu de travail doit être indiquer'),
                    new Assert\Length(['min' => 4, 'max' => 150]),
                ]
            ])
            ->add('cvFile', TextType::class, [
                'label' => 'CV',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'attr' => [
                    'class'=> 'form-control',
                ],
            ])
            ->add('isValid')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
