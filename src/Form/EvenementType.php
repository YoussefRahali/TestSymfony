<?php

namespace App\Form;

use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomEv')
            ->add('descriptionEv')
            ->add('dateEv', DateTimeType::class, [
                'widget' => 'single_text',  // Utilisation du sélecteur de date/heure (date picker)
                'html5' => false,            // Utilisation du sélecteur natif HTML5
                'attr' => [
                    'class' => 'form-control', // Classe pour styliser le champ
                ],
                'input' => 'datetime', // Spécifier que le champ est de type datetime
                'format' => 'yyyy-MM-dd HH:mm', // Format d'affichage de la date et de l'heure
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
