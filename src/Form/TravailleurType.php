<?php

namespace App\Form;

use App\Entity\Personne;
use App\Entity\Travailleur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TravailleurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('diplome')
            ->add('experience')
            ->add('langue')
            ->add('categorie')
            ->add('personne', EntityType::class, [
                'class' => Personne::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Travailleur::class,
        ]);
    }
}
