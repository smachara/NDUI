<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
        
            ->add('name', null, ['label' => 'form.networkconfig.field.label.name', 'translation_domain' => 'networkconfig'])
            ->add('description', null, ['label' => 'form.networkconfig.field.label.description', 'translation_domain' => 'networkconfig'])
            ->add('config_value', TextareaType::class , [
                'label' => 'form.networkconfig.field.label.config_value',
                'translation_domain' => 'networkconfig',
                'attr' => ['style' => 'display:none;'],
                //'empty_data'  => $data,
                ])
            ->add('yml_value', TextareaType::class , [
                'label' => 'form.networkconfig.field.label.yml_value',
                'translation_domain' => 'networkconfig',
                'attr' => ['style' => 'disabled:disabled;'],
                //'empty_data'  => $data,
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
