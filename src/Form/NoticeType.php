<?php

namespace App\Form;

use App\Entity\Notice;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class NoticeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'attr' => [
                    'class'=> 'form-control',
                    'minlength' => 4,
                    'maxlength' => 50,
                    'minMessage' => 'Votre titre est trop court',
                    'maxMessage' => 'Votre titre est trop long',
                ],
                'constraints' => [
                    new Assert\NotBlank(message: 'Le titre de l\'annonce doit être indiquer'),
                    new Assert\Length(['min' => 4, 'max' => 50]),
                ]
            ])
            ->add('description', TextareaType::class, [
                'attr' => [
                    'class'=> 'form-control',
                    'minlength' => 20,
                    'minMessage' => 'Votre texte est trop court',
                ],
                'label' => 'Description',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\NotBlank(message: 'Veuillez décrire le poste'),
                    new Assert\Length(['min' => 20]),
                ],
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
            ->add('salary', MoneyType::class, [
                'label' => 'Salaire',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'attr' => [
                    'class'=> 'form-control',
                    'minlength' => 2,
                    'maxlength' => 5,
                ],
                'constraints' => [
                    new Assert\NotBlank(message: 'Le montant du salaire doit être indiquer'),
                    new Assert\Positive(),
                    new Assert\Length(['min' => 2, 'max' => 5]),
                ]
            ])
            ->add('schedule', TextType::class, [
                'label' => 'Horaires',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'attr' => [
                    'class'=> 'form-control',
                    'minlength' => 4,
                    'maxlength' => 10,
                ],
                'constraints' => [
                    new Assert\NotBlank(message: 'Le temps de travail doit être indiquer'),
                    new Assert\Length(['min' => 4, 'max' => 50]),
                ]
            ])
            // ->add('createdAt', DateTimeType::class, [
            //     'label' => 'Date de création',
            //     'label_attr' => [
            //         'class' => 'form-label mt-4'
            //     ],
            //     'attr' => [
            //         'class' => 'form-control',
            //     ],
            //     'constraints' => [
            //         new Assert\NotBlank(message: 'Une date de création doit être indiquer'),
            //     ]
            // ])
            ->add('recruteur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Notice::class,
        ]);
    }
}
