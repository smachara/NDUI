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
     * @Route("/conf-workfloweditor.xml", name="conf-workfloweditor")
     */
    public function confWorkflowEditorXmlAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle:etsoeditor:conf.workfloweditor.xml.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/conf-wftoolbar-commons.xml", name="conf-wftoolbar-commons")
     */
    public function confWFToolbarXmlAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle:etsoeditor:conf.wftoolbar-commons.xml.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/conf-wfgraph-commons.xml", name="conf-wfgraph-commons")
     */
    public function confWFGraphCommonsXmlAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle:etsoeditor:conf.wfgraph-commons.xml.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("conf-wfeditor-commons.xml", name="conf-wfeditor-commons")
     */
    public function confWFEditorCommonsXmlAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle:etsoeditor:conf.wfeditor-commons.xml.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("conf-editor-commons.xml", name="conf-editor-commons")
     */
    public function confEditorCommonsXmlAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle:etsoeditor:conf.editor-commons.xml.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
