<?php

namespace App\Form;

use App\Entity\Animal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Range;

class AnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', null, [
                'constraints' => [
                    new NotBlank(['message' => 'Vous devez mettre le nom de votre animal!!!']),
                ],
            ])
            ->add('age', null, [
                'constraints' => [
                    new NotBlank(['message' => 'Vous devez mettre l\'age!!!']),
                    new Type(['type' => 'integer', 'message' => 'Âge doit être un nombre entier']),
                    new Range(['min' => 1, 'minMessage' => 'Âge doit être supérieur à 0']),
                ],
            ])
            ->add('categorie', ChoiceType::class, [
                'choices' => ['Chien' => 'Chien', 'Chat' => 'Chat'],
                'constraints' => [
                    new NotBlank(['message' => 'Vous devez choisir la categorie!!!']),
                ],
            ])
            ->add('type', null, [
                'constraints' => [
                    new NotBlank(['message' => 'Vous devez mettre le type!!!']),
                ],
            ])
            ->add('details', TextareaType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Vous devez mettre les details!!!']),
                ],
            ])
            ->add('poids', null, [
                'constraints' => [
                    new NotBlank(['message' => 'Vous devez mettre le poids!!!']),
                    new Type(['type' => 'float', 'message' => 'Le poids doit être un nombre décimal']),
                    new Range(['min' => 0.1, 'minMessage' => 'Le poids doit être supérieur à 0']),
                ],
            ])
            ->add('Add', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}
