<?php
namespace App\Form;

use App\Entity\Travailleur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TravailleurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Add fields specific to Travailleur entity
            ->add('diplome')
            ->add('experience')
            ->add('langue')
            ->add('categorie')
            // Embed the form for Personne
            ->add('personne', PersonneType::class); // Assuming you have a PersonneType for the Personne entity
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Travailleur::class,
        ]);
    }
}
