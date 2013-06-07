<?php

namespace Gajdaw\AngazeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name') //imie
            ->add('surname') //nazwisko
            ->add('position') //stanowisko
            ->add('room'); //pokoj
        ;
    }
    //otka
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gajdaw\AngazeBundle\Entity\Employee'
        ));
    }

    public function getName()
    {
        return 'gajdaw_angazebundle_employeetype';
    }
}
