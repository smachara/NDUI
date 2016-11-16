<?php

namespace AppBundle\Form;

use Lexik\Bundle\FormFilterBundle\Filter\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NetworkFunctionFilterType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        
            ->add('name', Type\TextFilterType::class, ['label' => 'form.networkfunction.field.label.name', 'translation_domain' => 'networkfunction'])
//            ->add('attributes', Type\TextFilterType::class, ['label' => 'form.networkfunction.field.label.attributes', 'translation_domain' => 'networkfunction'])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\NetworkFunction',
            'csrf_protection' => false,
            'validation_groups' => ['filter'],
            'method' => 'GET',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'networkfunction_filter';
    }
}
