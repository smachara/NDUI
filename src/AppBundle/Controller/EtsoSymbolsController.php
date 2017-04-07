<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
/**
 * Etso Editor controller.
 *
 * @Route("/etso/shapes/")
 */
class EtsoSymbolsController extends Controller
{
    /**
     * @Route("{tb}/{tc}/{sc}/{bg}/{w}/{h}/{label}/{shape}.svg", name="shape")
     */
    public function renderShapeAction(Request $request, $shape, $bg, $sc, $w, $h, $label, $tc, $tb)
    {
        return $this->render('AppBundle:symbols:'.$shape.'.svg.twig', [
            'label' => $label,
            'shape' => $shape,
            'tc'    =>  $tc,
            'tb'    =>  $tb,
            'bg'    =>  $bg,
            'sc'    => $sc,
            'w'     => $w,
            'h'     => $h,
        ]);
    }

}
