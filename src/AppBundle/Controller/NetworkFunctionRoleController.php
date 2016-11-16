<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\NetworkFunctionRole;
use AppBundle\Form\NetworkFunctionRoleType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * NetworkFunctionRole controller.
 *
 * @Route("/ns-role")
 */
class NetworkFunctionRoleController extends Controller
{
    /**
     * Lists all NetworkFunctionRole entities.
     *
     * @Route("/", name="networkfunctionrole")
     * @Method("GET")
     */
    public function indexAction()
    {
                $entities = $this->getDoctrine()->getRepository('AppBundle:NetworkFunctionRole')->findAll();
        return $this->render('AppBundle:networkfunctionrole:index.html.twig', [
            'entities' => $entities,
        ]);
    }

    /**
     * Finds and displays a NetworkFunctionRole entity.
     *
     * @Route("/{id}/show", name="networkfunctionrole_show", requirements={"id"="\d+"})
     * @Method("GET")

     */
    public function showAction(NetworkFunctionRole $networkfunctionrole)
    {
        $deleteForm = $this->createDeleteForm($networkfunctionrole->getId(), 'networkfunctionrole_delete');

        return $this->render('AppBundle:networkfunctionrole:show.html.twig', [
            'networkfunctionrole' => $networkfunctionrole,
            'delete_form' => $deleteForm->createView(),        ]);
    }

    /**
     * Creates a new NetworkFunctionRole entity.
     *
     * @Route("/new", name="networkfunctionrole_new")
     * @Method({"GET", "POST"})

     */
    public function newAction(Request $request)
    {
        $networkfunctionrole = new NetworkFunctionRole();
        $form = $this->createForm(NetworkFunctionRoleType::class, $networkfunctionrole);
        if ($form->handleRequest($request)->isValid()) {
            try{
                $this->getDoctrine()->getManager()->persist($networkfunctionrole);
                $this->getDoctrine()->getManager()->flush();

                $request->getSession()->getFlashBag()
                ->add('success', $this->get('translator')->trans('form.networkfunctionrole.new.message.success', [], 'networkfunctionrole'));

            return $this->redirect($this->generateUrl('networkfunctionrole_show', ['id' => $networkfunctionrole->getId()]));
            } catch(\Exception $e){
                $request->getSession()->getFlashBag()
                ->add('error',  $this->get('translator')->trans('form.networkfunctionrole.new.message.error', [], 'networkfunctionrole'));
                $this->get('logger')->error($e->getMessage());
            }
        }

        return $this->render('AppBundle:networkfunctionrole:new.html.twig', [
            'networkfunctionrole' => $networkfunctionrole,
            'form' => $form->createView(),
        ]);
    }


    /**
     * Edits an existing NetworkFunctionRole entity.
     *
     * @Route("/{id}/edit", name="networkfunctionrole_edit", requirements={"id"="\d+"})
     * @Method({"GET", "PUT"})
     */
    public function editAction(NetworkFunctionRole $networkfunctionrole, Request $request)
    {
        $editForm = $this->createForm(NetworkFunctionRoleType::class, $networkfunctionrole, ['method' => 'PUT']);
        if ($editForm->handleRequest($request)->isValid()) {
            try{
                $this->getDoctrine()->getManager()->flush();

                $request->getSession()->getFlashBag()
                ->add('success', $this->get('translator')->trans('form.networkfunctionrole.edit.message.success', [], 'networkfunctionrole'));

                return $this->redirect($this->generateUrl('networkfunctionrole_edit', ['id' => $networkfunctionrole->getId()]));

                } catch(\Exception $e){
                    $request->getSession()->getFlashBag()
                    ->add('error',  $this->get('translator')->trans('form.networkfunctionrole.edit.message.error', [], 'networkfunctionrole'));
                    $this->get('logger')->error($e->getMessage());
                }

    }

        $deleteForm = $this->createDeleteForm($networkfunctionrole->getId(), 'networkfunctionrole_delete');

        return $this->render('AppBundle:networkfunctionrole:edit.html.twig', [
            'networkfunctionrole' => $networkfunctionrole,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }    /**
    * @Route("/{id}/delete-confirmation", name="networkfunctionrole_delete_confirmation")
    * @Method("GET")
    */
    public function deleteConfirmationAction(NetworkFunctionRole $networkfunctionrole)
    {
        $deleteForm = $this->createDeleteForm($networkfunctionrole->getId(), 'networkfunctionrole_delete');

        return $this->render('AppBundle:networkfunctionrole:delete.confirm.html.twig', array(
            'networkfunctionrole' => $networkfunctionrole,
            'delete_form' => $deleteForm->createView(),
        ));
    }



    /**
     * Deletes a NetworkFunctionRole entity.
     *
     * @Route("/{id}/delete", name="networkfunctionrole_delete", requirements={"id"="\d+"})
     * @Method("DELETE")
     */
    public function deleteAction(NetworkFunctionRole $networkfunctionrole, Request $request)
    {
        $form = $this->createDeleteForm($networkfunctionrole->getId(), 'networkfunctionrole_delete');
        if ($form->handleRequest($request)->isValid()) {
            try{
                $this->getDoctrine()->getManager()->remove($networkfunctionrole);
                $this->getDoctrine()->getManager()->flush();

                $request->getSession()->getFlashBag()
                  ->add('success', $this->get('translator')->trans('form.networkfunctionrole.delete.message.success', [], 'networkfunctionrole'));

            } catch(\Exception $e){
                $request->getSession()->getFlashBag()
                ->add('error',  $this->get('translator')->trans('form.networkfunctionrole.delete.message.error', [], 'networkfunctionrole'));
                $this->get('logger')->error($e->getMessage());
            }
        }
        return $this->redirect($this->generateUrl('networkfunctionrole'));
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
