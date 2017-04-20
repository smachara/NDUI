<?php
/**
 * Created by PhpStorm.
 * User: machar_s
 * Date: 20/04/2017
 * Time: 13:46
 */



namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Entity\Symbol;
use AppBundle\Entity\NetworkFunctionRole;

/**
 * Symbol controller.
 *
 * @Route("/symbol")
 */
class SymbolController extends Controller
{
    /**
     * Creates a new Symbol entity.
     *
     * @Route("/{id}/new",  name="symbol_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, NetworkFunctionRole $networkFunctionRole)
    {
        $symbol = new Symbol();
        $symbol->setNetworkFunctionRole($networkFunctionRole);

        $form = $this->createForm('AppBundle\Form\SymbolType', $symbol);
        $form->handleRequest($request);

        $networkFunctionRole->setSymbol($symbol);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($networkFunctionRole);
            $em->flush();

            return $this->redirectToRoute('networkfunctionrole');
        }

        return $this->render('AppBundle:symbol:new.html.twig', array(
            'id' => $networkFunctionRole->getId(),
            'symbol' => $symbol,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Symbol entity.
     *
     * @Route("/{id}/edit", name="symbol_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, NetworkFunctionRole $networkFunctionRole)
    {
        $symbol = $networkFunctionRole->getSymbol();

        $deleteForm = $this->createDeleteForm($symbol);
        $editForm = $this->createForm('AppBundle\Form\SymbolType', $symbol);
        $editForm->handleRequest($request);

        $networkFunctionRole->setSymbol($symbol);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($networkFunctionRole);
            $em->flush();

            return $this->redirectToRoute('networkfunctionrole');

        }

        return $this->render('AppBundle:symbol:edit.html.twig', array(
            'symbol' => $symbol,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Symbol entity.
     *
     * @Route("/{id}", name="symbol_delete")
     * @Method("DELETE")

     */
    public function deleteAction(Request $request, Symbol $symbol)
    {
        $form = $this->createDeleteForm($symbol);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($symbol);
            $em->flush();
        }

        return $this->redirectToRoute('networkfunctionrole');
    }

    /**
     * Creates a form to delete a Symbol entity.
     *
     * @param Symbol $symbol The Symbol entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Symbol $symbol)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('symbol_delete', array('id' => $symbol->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}
