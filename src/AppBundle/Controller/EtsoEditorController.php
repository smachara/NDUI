<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EtsoEditorController extends Controller
{
    /**
     * @Route("/etso-editor", name="mxgraph")
     */
    public function mainAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle:etsoeditor:etsoeditor.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }


    /**
     * @Route("config/diagrameditor.xml", name="config-diagrameditor-commons")
     */
    public function diagrameditorXmlAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle:etsoeditor:diagrameditor.xml.twig',[]);
    }

    /**
     * @Route("config/editor-commons.xml", name="config-editor-commons")
     */
    public function editorcommonsXmlAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle:etsoeditor:editor-commons.xml.twig',[]);
    }


    /**
     * @Route("config/keyhandler-commons.xml", name="config-keyhandler-commons")
     */
    public function keyhandlercommonsXmlAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle:etsoeditor:keyhandler-commons.xml.twig',[]);
    }

    /**
     * @Route("dia/template.xml", name="dia-template.xml")
     */
    public function diagramsTemplateXmlAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle:etsoeditor:dia-template.xml.twig',[]);
    }

}

