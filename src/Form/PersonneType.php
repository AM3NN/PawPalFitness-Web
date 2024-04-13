<?php

namespace App\Form;

use App\Entity\Personne;
use App\Entity\Role;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('region')
            ->add('email')
            ->add('password', PasswordType::class)
            ->add('age')
            ->add('role', EntityType::class, [
                'class' => Role::class,
                'choice_label' => 'role_id',
                'label' => false, 
                'mapped' => false, 
                'attr' => ['style' => 'display:none'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    { 
        $resolver->setDefaults([
            'data_class' => Personne::class,
            // Set the default value for the role field
            'empty_data' => function ($form) {
                return $form->getConfig()->getOptions()['role_default_value'];
            },
            // Pass the default role value to the form type options
            'role_default_value' => 2,
        ]);
    }
}
