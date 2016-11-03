<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NetworkFunctionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        
            ->add('name', null, ['label' => 'form.networkfunction.field.label.name', 'translation_domain' => 'networkfunction'])
            ->add
            ('attributes', CollectionType::class, array
                (
                    'entry_type' => AttributeType::class,
                    'prototype_name' => 'attrib_attributes',
                    'prototype'    => true,
                    'label'      => 'form.networkfunction.field.label.attributes',
                    'translation_domain' => 'networkfunction',
                    'allow_add'    => true,
                    'allow_delete' => true,
                    'required'     => true,
                    'by_reference' => false,
                    'attr'         => array
                    (
                        'class' => 'networkfunctionAttributes',
                    )
                )
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\NetworkFunction',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'networkfunction';
    }
}
