<?php

namespace AppBundle\Controller;

use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\NetworkConfig;
use AppBundle\Model\NetworkConfigModel;

use AppBundle\Form\NetworkConfigType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use JMS\Serializer\SerializerBuilder as Serializer;


/**
 * NetworkConfig controller.
 *
 * @Route("/networkconfig")
 */
class NetworkConfigController extends Controller
{
    /**
     * Finds and displays a category entity.
     * @Route("/{id}/down", name="networkconfig_down")
     * @Method("GET")
     */
    public function moveDownAction(NetworkConfig $network_config, Request $request )
    {
        $repo= $this->getDoctrine()->getRepository(NetworkConfig::class);
        $node = $repo->findOneById($network_config->getId());

        try{
            $repo->moveDown($node, 1);
            $this->getDoctrine()->getManager()->flush();
            $request->getSession()->getFlashBag()
                ->add('success', $this->get('translator')->trans('form.networkconfig.move_down.message.success', [], 'networkconfig'));


        } catch(\Exception $e){
            $request->getSession()->getFlashBag()
                ->add('error',  $this->get('translator')->trans('form.networkconfig.move_down.message.error', [], 'networkconfig'));
            $this->get('logger')->error($e->getMessage());
        }
        return $this->redirect($this->generateUrl('networkconfig'));

    }

    /**
     * Finds and displays a NetworkConfig entity.
     * @Route("/{id}/up", name="networkconfig_up")
     * @Method("GET")
     *
     */
    public function moveUpAction(NetworkConfig $network_config, Request $request)
    {
        $repo = $this->getDoctrine()->getRepository(NetworkConfig::class);
        $node = $repo->findOneById($network_config->getId());

        try{
            $repo->moveUp($node, 1);
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()
                ->add('success', $this->get('translator')->trans('form.networkconfig.move_down.message.success', [], 'networkconfig'));


        } catch(\Exception $e){
            $request->getSession()->getFlashBag()
                ->add('error',  $this->get('translator')->trans('form.networkconfig.move_down.message.error', [], 'networkconfig'));
            $this->get('logger')->error($e->getMessage());
        }
        return $this->redirect($this->generateUrl('networkconfig'));
    }

    /**
     * Lists all NetworkConfig entities.
     *
     * @Route("/", name="networkconfig")
     * @Method("GET")
     */
    public function indexAction()
    {

        $repo= $this->getDoctrine()->getRepository('AppBundle:NetworkConfig');
        $entities = $repo-> findAll([],['id'=>'asc']);



        $options = array(
            'decorate' => true,
            'rootOpen' => '<ul>',
            'rootClose' => '</ul>',
            'childOpen' => '<li>',
            'childClose' => '</li>',
            'nodeDecorator' => function($node) {

                $em = $this->getDoctrine()->getManager();
                $network_config = $em->getRepository(NetworkConfig::class)->findOneById($node["id"]);


                //dump($network_config); die();
                return  $this->render('AppBundle:networkconfig:tree.html.twig', [
                    'node' => $network_config]);
            }
        );

        $nodes = $repo->childrenHierarchy(
            null,/* starting from root nodes */
            false, /* false: load all children, true: only direct */
            $options);



        $repo= $this->getDoctrine()->getRepository('AppBundle:NetworkFunction');
        $networkFunctions = $repo-> findAll([],['id'=>'asc']);


        return $this->render('AppBundle:networkconfig:index.html.twig', [
            'networkFunctions' => $networkFunctions,
            'entities' => $entities,
            'nodes' => $nodes,
        ]);


    }

    /**
     * Finds and displays a NetworkConfig entity.
     *
     * @Route("/{id}/show", name="networkconfig_show", requirements={"id"="\d+"})
     * @Method("GET")

     */
    public function showAction(NetworkConfig $networkconfig)
    {
        $deleteForm = $this->createDeleteForm($networkconfig->getId(), 'networkconfig_delete');

        return $this->render('AppBundle:networkconfig:show.html.twig', [
            'networkconfig' => $networkconfig,
            'delete_form' => $deleteForm->createView(),        ]);
    }

    /**
     * Finds and displays a NetworkConfig entity.
     *
     * @Route("/{id}/yml", name="networkconfig_yml", requirements={"id"="\d+"})
     * @Method("GET")

     */
    public function ymlAction(NetworkConfig $networkconfig)
    {
        $networkconfig_model = new NetworkConfigModel();
        $networkconfig_model->cast($networkconfig_model, $networkconfig);
        //$networkconfig_model->setNetworkFunction($networkconfig->getNetworkFunction());
        //$networkconfig_model->setChildren((NetworkConfigModel::class)$networkconfig);
        $serializer = SerializerBuilder::create()->build();
        //dump($networkconfig);
        //dump($serializer->serialize($networkconfig_model, 'yml'));
        //die();

        return $this->render('AppBundle:networkconfig:yml.html.twig', [
            'networkconfig' => $networkconfig_model,
            //'nodes' => $elements,
        ]);
    }


    /**
     * Creates a new NetworkConfig entity.
     *
     * @Route("/new", name="networkconfig_new")
     * @Method({"GET", "POST"})

     */
    public function newAction(Request $request)
    {
        $networkconfig = new NetworkConfig();
        $form = $this->createForm(NetworkConfigType::class, $networkconfig);
        if ($form->handleRequest($request)->isValid()) {
            try{
                $this->getDoctrine()->getManager()->persist($networkconfig);
                $this->getDoctrine()->getManager()->flush();

                $request->getSession()->getFlashBag()
                ->add('success', $this->get('translator')->trans('form.networkconfig.new.message.success', [], 'networkconfig'));

            return $this->redirect($this->generateUrl('networkconfig_show', ['id' => $networkconfig->getId()]));
            } catch(\Exception $e){
                $request->getSession()->getFlashBag()
                ->add('error',  $this->get('translator')->trans('form.networkconfig.new.message.error', [], 'networkconfig'));
                $this->get('logger')->error($e->getMessage());
            }
        }

        return $this->render('AppBundle:networkconfig:new.html.twig', [
            'networkconfig' => $networkconfig,
            'form' => $form->createView(),
        ]);
    }


    /**
     * Edits an existing NetworkConfig entity.
     *
     * @Route("/{id}/edit", name="networkconfig_edit", requirements={"id"="\d+"})
     * @Method({"GET", "PUT"})
     */
    public function editAction(NetworkConfig $networkconfig, Request $request)
    {
        $editForm = $this->createForm(NetworkConfigType::class, $networkconfig, ['method' => 'PUT']);
        if ($editForm->handleRequest($request)->isValid()) {
            try{
                $this->getDoctrine()->getManager()->flush();

                $request->getSession()->getFlashBag()
                ->add('success', $this->get('translator')->trans('form.networkconfig.edit.message.success', [], 'networkconfig'));

                return $this->redirect($this->generateUrl('networkconfig_edit', ['id' => $networkconfig->getId()]));

                } catch(\Exception $e){
                    $request->getSession()->getFlashBag()
                    ->add('error',  $this->get('translator')->trans('form.networkconfig.edit.message.error', [], 'networkconfig'));
                    $this->get('logger')->error($e->getMessage());
                }

    }

        $deleteForm = $this->createDeleteForm($networkconfig->getId(), 'networkconfig_delete');

        return $this->render('AppBundle:networkconfig:edit.html.twig', [
            'networkconfig' => $networkconfig,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }    /**
    * @Route("/{id}/delete-confirmation", name="networkconfig_delete_confirmation")
    * @Method("GET")
    */
    public function deleteConfirmationAction(NetworkConfig $networkconfig)
    {
        $deleteForm = $this->createDeleteForm($networkconfig->getId(), 'networkconfig_delete');

        return $this->render('AppBundle:networkconfig:delete.confirm.html.twig', array(
            'networkconfig' => $networkconfig,
            'delete_form' => $deleteForm->createView(),
        ));
    }



    /**
     * Deletes a NetworkConfig entity.
     *
     * @Route("/{id}/delete", name="networkconfig_delete", requirements={"id"="\d+"})
     * @Method("DELETE")
     */
    public function deleteAction(NetworkConfig $networkconfig, Request $request)
    {
        $form = $this->createDeleteForm($networkconfig->getId(), 'networkconfig_delete');
        if ($form->handleRequest($request)->isValid()) {
            try{
                $this->getDoctrine()->getManager()->remove($networkconfig);
                $this->getDoctrine()->getManager()->flush();

                $request->getSession()->getFlashBag()
                  ->add('success', $this->get('translator')->trans('form.networkconfig.delete.message.success', [], 'networkconfig'));

            } catch(\Exception $e){
                $request->getSession()->getFlashBag()
                ->add('error',  $this->get('translator')->trans('form.networkconfig.delete.message.error', [], 'networkconfig'));
                $this->get('logger')->error($e->getMessage());
            }
        }
        return $this->redirect($this->generateUrl('networkconfig'));
    }

    /**
     * Create Delete form
     *
     * @param integer                       $id
     * @param string                        $route
     * @return \Symfony\Component\Form\Form
     */
    protected function createDeleteForm($id, $route)
    {
        return $this->createFormBuilder(null, ['attr' => ['id' => 'delete']])
            ->setAction($this->generateUrl($route, ['id' => $id]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

}
