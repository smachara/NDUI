<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\RemoteSvr;
use AppBundle\Form\RemoteSvrType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * RemoteSvr controller.
 *
 * @Route("/rsvr")
 */
class RemoteSvrController extends Controller
{
    /**
     * Lists all RemoteSvr entities.
     *
     * @Route("/", name="rsvr")
     * @Method("GET")
     */
    public function indexAction()
    {
                $entities = $this->getDoctrine()->getRepository('AppBundle:RemoteSvr')->findAll();
        return $this->render('AppBundle:remotesvr:index.html.twig', [
            'entities' => $entities,
        ]);
    }

    /**
     * Finds and displays a RemoteSvr entity.
     *
     * @Route("/{id}/show", name="rsvr_show", requirements={"id"="\d+"})
     * @Method("GET")

     */
    public function showAction(RemoteSvr $remotesvr)
    {
        $deleteForm = $this->createDeleteForm($remotesvr->getId(), 'rsvr_delete');

        return $this->render('AppBundle:remotesvr:show.html.twig', [
            'remotesvr' => $remotesvr,
            'delete_form' => $deleteForm->createView(),        ]);
    }

    /**
     * Creates a new RemoteSvr entity.
     *
     * @Route("/new", name="rsvr_new")
     * @Method({"GET", "POST"})

     */
    public function newAction(Request $request)
    {
        $remotesvr = new RemoteSvr();
        $form = $this->createForm(RemoteSvrType::class, $remotesvr);
        if ($form->handleRequest($request)->isValid()) {
            try{
                $this->getDoctrine()->getManager()->persist($remotesvr);
                $this->getDoctrine()->getManager()->flush();

                $request->getSession()->getFlashBag()
                ->add('success', $this->get('translator')->trans('form.remotesvr.new.message.success', [], 'remotesvr'));

            return $this->redirect($this->generateUrl('rsvr_show', ['id' => $remotesvr->getId()]));
            } catch(\Exception $e){
                $request->getSession()->getFlashBag()
                ->add('error',  $this->get('translator')->trans('form.remotesvr.new.message.error', [], 'remotesvr'));
                $this->get('logger')->error($e->getMessage());
            }
        }

        return $this->render('AppBundle:remotesvr:new.html.twig', [
            'remotesvr' => $remotesvr,
            'form' => $form->createView(),
        ]);
    }


    /**
     * Edits an existing RemoteSvr entity.
     *
     * @Route("/{id}/edit", name="rsvr_edit", requirements={"id"="\d+"})
     * @Method({"GET", "PUT"})
     */
    public function editAction(RemoteSvr $remotesvr, Request $request)
    {
        $editForm = $this->createForm(RemoteSvrType::class, $remotesvr, ['method' => 'PUT']);
        if ($editForm->handleRequest($request)->isValid()) {
            try{
                $this->getDoctrine()->getManager()->flush();

                $request->getSession()->getFlashBag()
                ->add('success', $this->get('translator')->trans('form.remotesvr.edit.message.success', [], 'remotesvr'));

                return $this->redirect($this->generateUrl('rsvr_edit', ['id' => $remotesvr->getId()]));

                } catch(\Exception $e){
                    $request->getSession()->getFlashBag()
                    ->add('error',  $this->get('translator')->trans('form.rsvr.edit.message.error', [], 'rsvr'));
                    $this->get('logger')->error($e->getMessage());
                }

    }

        $deleteForm = $this->createDeleteForm($remotesvr->getId(), 'rsvr_delete');

        return $this->render('AppBundle:remotesvr:edit.html.twig', [
            'remotesvr' => $remotesvr,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }    /**
    * @Route("/{id}/delete-confirmation", name="rsvr_delete_confirmation")
    * @Method("GET")
    */
    public function deleteConfirmationAction(RemoteSvr $remotesvr)
    {
        $deleteForm = $this->createDeleteForm($remotesvr->getId(), 'rsvr_delete');

        return $this->render('AppBundle:remotesvr:delete.confirm.html.twig', array(
            'remotesvr' => $remotesvr,
            'delete_form' => $deleteForm->createView(),
        ));
    }



    /**
     * Deletes a RemoteSvr entity.
     *
     * @Route("/{id}/delete", name="rsvr_delete", requirements={"id"="\d+"})
     * @Method("DELETE")
     */
    public function deleteAction(RemoteSvr $remotesvr, Request $request)
    {
        $form = $this->createDeleteForm($remotesvr->getId(), 'rsvr_delete');
        if ($form->handleRequest($request)->isValid()) {
            try{
                $this->getDoctrine()->getManager()->remove($remotesvr);
                $this->getDoctrine()->getManager()->flush();

                $request->getSession()->getFlashBag()
                  ->add('success', $this->get('translator')->trans('form.remotesvr.delete.message.success', [], 'remotesvr'));

            } catch(\Exception $e){
                $request->getSession()->getFlashBag()
                ->add('error',  $this->get('translator')->trans('form.remotesvr.delete.message.error', [], 'remotesvr'));
                $this->get('logger')->error($e->getMessage());
            }
        }
        return $this->redirect($this->generateUrl('rsvr'));
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
