<?php

namespace App\Form;

use App\Entity\Depenses;
use App\Entity\Employee;
use App\Entity\TypeDepense;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DepenseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('amount')
            ->add('date_depense')
            ->add('typedepense',EntityType::class,[
                'required'=>true,
                'class'=>TypeDepense::class,
                'choice_label'=>'libelle'
            ])
            ->add('employee',EntityType::class,[
                'required'=>true,
                'class'=>Employee::class,
                'choice_label'=>'lastname'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Depenses::class,
        ]);
    }

}
