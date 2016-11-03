<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NetworkConfigType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        
            ->add('network_function', NetworkFunctionListType::class, ['label' => 'form.networkconfig.field.label.network_function', 'translation_domain' => 'networkconfig'])
            ->add('parent', ParentType::class ,[
                'label' => 'form.networkconfig.field.label.parent',
                'translation_domain' => 'networkconfig',
                'expanded' => false,
                'multiple' => false,
                'required'    => false,
                'placeholder' => 'form.networkconfig.field.placeholder.choose_a_parent',
                'empty_data'  => null
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\NetworkConfig',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'networkconfig';
    }
}
