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
class DefaultController extends Controller
{
/*
    rectangle
    trapezoide
    square
    circle
    triangleRight
    triangleDown
    triangleLeft
    triangleUp
    Diamond
    Pentagon
    Hexagon
    Octagon
    FivePointedStar
    SixPointedStar
    Paralelograme

*/

    /**
     * @Route("/{shape}/{bc}/{sc}", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

}
