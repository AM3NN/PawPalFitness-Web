<?php
namespace App\Form;

use App\Entity\Personne;
use App\Entity\Role;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

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
                'choice_label' => 'roleName', // Adjust according to your Role entity
                'label' => false, 
                'mapped' => false, 

                'attr' => ['style' => 'display:none'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personne::class,
<<<<<<< Updated upstream
            // Set the default value for the role field
            'empty_data' => function ($form) {
                // Here, you don't need to set a default role
                return null;
            },
=======
            'role_default_value' => 2, // Default role value
            'empty_data' => null, // Ensure empty data is set to null
>>>>>>> Stashed changes
        ]);
    }
    
}
