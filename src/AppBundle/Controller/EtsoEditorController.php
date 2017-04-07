<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


use AppBundle\Form\SendConfigType;
use Symfony\Component\HttpFoundation\RedirectResponse;


use AppBundle\Entity\NetworkConfig;
use AppBundle\Form\NetworkConfigType;

use JMS\Serializer\SerializerBuilder as Serializer;
use AppBundle\Model\NetworkConfigModel;
use Symfony\Component\HttpFoundation\Response;


/**
 * Etso Editor controller.
 *
 * @Route("/etso")
 */
class EtsoEditorController extends Controller
{
    /**
     * @Route("/editor", name="mxgraph")
     */
    public function mainAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle:etsoeditor:etsoeditor.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }


    /**
     * @Route("/config/diagrameditor.xml", name="config-diagrameditor-commons")
     */
    public function diagrameditorXmlAction(Request $request)
    {

        $repo= $this->getDoctrine()->getRepository('AppBundle:NetworkFunction');
        $networkFunctions = $repo-> findAll([],['role'=>'asc']);

        return $this->render('AppBundle:etsoeditor:diagrameditor.xml.twig',['networkFunctions' => $networkFunctions ,]);
    }

    /**
     * @Route("/config/editor-commons.xml", name="config-editor-commons")
     */
    public function editorcommonsXmlAction(Request $request)
    {
        return $this->render('AppBundle:etsoeditor:editor-commons.xml.twig',[]);
    }


    /**
     * @Route("/config/keyhandler-commons.xml", name="config-keyhandler-commons")
     */
    public function keyhandlercommonsXmlAction(Request $request)
    {
        return $this->render('AppBundle:etsoeditor:keyhandler-commons.xml.twig',[]);
    }

    /**
     * @Route("/dia/template.xml", name="dia-template.xml")
     */
    public function diagramsTemplateXmlAction(Request $request)
    {
        return $this->render('AppBundle:etsoeditor:dia-template.xml.twig',[]);
    }
/***********************************************************************************************************************/
    /**
     * Creates a new NetworkConfig entity.
     *
     * @Route("/new", name="etso_new")
     * @Method({"GET", "POST"})

     */
    public function newAction(Request $request)
    {
        $networkconfig = new NetworkConfig();
        $form = $this->createForm(NetworkConfigType::class, $networkconfig);
        if ($form->handleRequest($request)->isValid()) {
            try{

                $networkconfig->setYmlValue( $this->ymlGenerator($request) );

                $this->getDoctrine()->getManager()->persist($networkconfig);
                $this->getDoctrine()->getManager()->flush();

                $request->getSession()->getFlashBag()
                    ->add('success', $this->get('translator')->trans('form.networkconfig.new.message.success', [], 'networkconfig'));
                return $this->redirect($this->generateUrl('nconfig_edit', ['id' => $networkconfig->getId()]));
                //return $this->redirect($this->generateUrl('etso_new', ['id' => $networkconfig->getId()]));
            } catch(\Exception $e){
                $request->getSession()->getFlashBag()
                    ->add('error',  $this->get('translator')->trans('form.networkconfig.new.message.error', [], 'networkconfig'));
                $this->get('logger')->error($e->getMessage());
            }
        }

        $repo= $this->getDoctrine()->getRepository('AppBundle:NetworkFunctionRole');
        $networkFunctionRoles = $repo-> findAll([],['role'=>'asc']);

        $repo= $this->getDoctrine()->getRepository('AppBundle:NetworkFunction');
        $networkFunctions = $repo-> findAll([],['role'=>'asc']);

        return $this->render('AppBundle:etsoeditor:new.html.twig', [
            'networkFunctionRoles' => $networkFunctionRoles,
            'networkFunctions' => $networkFunctions ,
            'networkconfig' => $networkconfig,
            'form' => $form->createView(),
        ]);
    }

}

