<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RemoteSvrType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        
            ->add('name', null, ['label' => 'form.remotesvr.field.label.name', 'translation_domain' => 'remotesvr'])
           // ->add('lastConfig', null, ['label' => 'form.remotesvr.field.label.lastConfig', 'translation_domain' => 'remotesvr'])
            ->add('url', null, ['label' => 'form.remotesvr.field.label.url', 'translation_domain' => 'remotesvr'])
           // ->add('lastConfigDate', null, ['label' => 'form.remotesvr.field.label.lastConfigDate', 'translation_domain' => 'remotesvr'])

         /* ->add('config_name', EntityType::class, array(
                    'label' => 'form.remotesvr.field.label.config_name',
                    'translation_domain' => 'remotesvr',
                    'class' => 'AppBundle:NetworkConfig',
                    'choice_label' => 'name',
                    'mapped' => false,
                )
            )*/
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\RemoteSvr',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'remotesvr';
    }
}
