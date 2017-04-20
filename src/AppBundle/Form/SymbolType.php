<?php
/**
 * Created by PhpStorm.
 * User: machar_s
 * Date: 20/04/2017
 * Time: 11:34
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class SymbolType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file',FileType::class,array(
                "attr"=>array(
                    "accept"=>"image/jpeg, image/png, image/svg",
                    "onchange"=>"handleFiles(this.files);",
                ),
            ))
            ->getForm();
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Symbol'
        ));
    }
}
