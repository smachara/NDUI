<?php

namespace AppBundle\Form;
/*
use Doctrine\DBAL\Types\BooleanType;
use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\DateType;
use Doctrine\DBAL\Types\DecimalType;
use Doctrine\DBAL\Types\IntegerType;
use Doctrine\DBAL\Types\StringType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
*/

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class AttributeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array(
                'label' => 'form.attribute.name',
                'translation_domain' => 'networkfunction',
            ))
            ->add('datatype', ChoiceType::class, array(
                'choices'  => array(
                    'string' => 'StringType::class',
                    'boolean' => 'BooleanType::class',
                    'integer' => 'IntegerType::class',
                    'decimal' => 'DecimalType::class',
                    'datetime' => 'DateTimeType::class',
                ),
                //'mapped' => false
            ))
            ->add('value', null, array(
                'label' => 'form.attribute.value',
                'translation_domain' => 'networkfunction',
            ))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'cascade_validation' => 'true',
        ));
    }

    public function getName()
    {
        return 'attribute_type';
    }
}
