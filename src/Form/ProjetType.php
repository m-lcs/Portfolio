<?php

namespace App\Form;

use App\Entity\annee;
use App\Entity\competences;
use App\Entity\Projets;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('image')
            ->add('lien')
            ->add('competences', EntityType::class, [
                'class' => competences::class,
                'choice_label' => 'id',
            ])
            ->add('annee', EntityType::class, [
                'class' => annee::class,
                'choice_label' => 'id',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Projets::class,
        ]);
    }
}
