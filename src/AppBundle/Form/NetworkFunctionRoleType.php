<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NetworkFunctionRoleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        
            ->add('name', null, ['label' => 'form.networkfunctionrole.field.label.name', 'translation_domain' => 'networkfunctionrole'])
            ->add('color', null, ['label' => 'form.networkfunctionrole.field.label.color', 'translation_domain' => 'networkfunctionrole'])
            ->add('stroke', null, ['label' => 'form.networkfunctionrole.field.label.stroke', 'translation_domain' => 'networkfunctionrole'])
            ->add('shape', null, ['label' => 'form.networkfunctionrole.field.label.shape', 'translation_domain' => 'networkfunctionrole'])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\NetworkFunctionRole',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'networkfunctionrole';
    }
}
