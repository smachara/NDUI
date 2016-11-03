<?php
/**
 * Created by PhpStorm.
 * User: machar_s
 * Date: 08/09/2016
 * Time: 10:51
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FunctionParentType extends AbstractType
{
    private $doctrine;

    public function __construct( $doctrine )
    {
        $this->doctrine = $doctrine;

    }

    public function configureOptions(OptionsResolver $resolver)
    {

        $resolver->setDefaults(array(
            'choices' => $this->getNodes(),
        ));
    }

    public function getParent()
    {
        return ChoiceType::class;
    }

    public function getName()
    {
        return 'function_parent_choice';
    }

    private function getNodes(){

        $em = $this->doctrine->getManager();

        $repo = $em->getRepository('AppBundle:NetworkConfig');

        $options = array(
        'decorate' => true,
        'rootOpen' => '',
        'rootClose' => '',
        'childOpen' => '',
        'childClose' => '',
        'nodeDecorator' => function($node) {
            //dump($node); die();
            return $node['id'].'*'.$node['lvl'].',';
        }
        );
        $nodes = explode(',',$repo->childrenHierarchy(
        null,/* starting from root nodes */
        false, /* false: load all children, true: only direct */
        $options));
        $parentChoices = [];

        foreach ($nodes  as $n ){
            //dump($nodes); die();

            $tmp = explode('*',$n);
            if ($tmp[0]){
                $nc = $repo->findOneById($tmp[0]);
                $parentChoices[str_repeat('--',$tmp[1]).($nc->getNetworkFunction()->getName())]
                    = $nc;
            }
        }
        return $parentChoices;
    }
}