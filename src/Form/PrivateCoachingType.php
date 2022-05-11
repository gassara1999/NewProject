<?php

namespace App\Form;

use App\Entity\PrivateCoaching;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrivateCoachingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('DateSession')
            ->add('BeginHour')
            ->add('EndHour')
            ->add('coach')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PrivateCoaching::class,
        ]);
    }
}
