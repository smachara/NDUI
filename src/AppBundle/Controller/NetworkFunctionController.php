<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\NetworkFunction;
use AppBundle\Form\NetworkFunctionType;
use AppBundle\Form\NetworkFunctionFilterType;
use Symfony\Component\Form\FormInterface;
use Doctrine\ORM\QueryBuilder;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * NetworkFunction controller.
 *
 * @Route("/networkfunction")
 */
class NetworkFunctionController extends Controller
{
    /**
     * Lists all NetworkFunction entities.
     *
     * @Route("/", name="networkfunction")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(NetworkFunctionFilterType::class);
        if (!is_null($response = $this->saveFilter($form, 'networkfunction', 'networkfunction'))) {
            return $response;
        }
    // initialize a query builder
    $filterBuilder = $this->get('doctrine.orm.entity_manager')
        ->getRepository('AppBundle:NetworkFunction')
        ->createQueryBuilder('n');

    if ($request->query->has($form->getName())) {
        // manually bind values from the request
        $form->submit($request->query->get($form->getName()));
        // build the query from the given form object
        $this->get('lexik_form_filter.query_builder_updater')
            ->addFilterConditions($form, $filterBuilder);
    }
    $query = $filterBuilder->getQuery();
            $maxItemPerPage =$request->query->get('maxItemPerPage');;
            if (!$maxItemPerPage){
            $maxItemPerPage = 5;
            }

            $entities = $this->filter($form, $filterBuilder, 'networkfunction', $maxItemPerPage);
        return $this->render('AppBundle:networkfunction:index.html.twig', [
            'form' => $form->createView(),
            'entities' => $entities,
        ]);
    }

    /**
     * Finds and displays a NetworkFunction entity.
     *
     * @Route("/{id}/show", name="networkfunction_show", requirements={"id"="\d+"})
     * @Method("GET")

     */
    public function showAction(NetworkFunction $networkfunction)
    {
        $deleteForm = $this->createDeleteForm($networkfunction->getId(), 'networkfunction_delete');

        return $this->render('AppBundle:networkfunction:show.html.twig', [
            'networkfunction' => $networkfunction,
            'delete_form' => $deleteForm->createView(),        ]);
    }

    /**
     * Creates a new NetworkFunction entity.
     *
     * @Route("/new", name="networkfunction_new")
     * @Method({"GET", "POST"})

     */
    public function newAction(Request $request)
    {
        $networkfunction = new NetworkFunction();
        $form = $this->createForm(NetworkFunctionType::class, $networkfunction);
        if ($form->handleRequest($request)->isValid()) {
            try{
                $this->getDoctrine()->getManager()->persist($networkfunction);
                $this->getDoctrine()->getManager()->flush();

                $request->getSession()->getFlashBag()
                ->add('success', $this->get('translator')->trans('form.networkfunction.new.message.success', [], 'networkfunction'));

            return $this->redirect($this->generateUrl('networkfunction_edit', ['id' => $networkfunction->getId()]));
            } catch(\Exception $e){
                $request->getSession()->getFlashBag()
                ->add('error',  $this->get('translator')->trans('form.networkfunction.new.message.error', [], 'networkfunction'));
                $this->get('logger')->error($e->getMessage());
            }
        }

        return $this->render('AppBundle:networkfunction:new.html.twig', [
            'networkfunction' => $networkfunction,
            'form' => $form->createView(),
        ]);
    }


    /**
     * Edits an existing NetworkFunction entity.
     *
     * @Route("/{id}/edit", name="networkfunction_edit", requirements={"id"="\d+"})
     * @Method({"GET", "PUT"})
     */
    public function editAction(NetworkFunction $networkfunction, Request $request)
    {
        $editForm = $this->createForm(NetworkFunctionType::class, $networkfunction, ['method' => 'PUT']);
        if ($editForm->handleRequest($request)->isValid()) {
            try{
                //dump($editForm); die();

                $this->getDoctrine()->getManager()->flush();

                $request->getSession()->getFlashBag()
                ->add('success', $this->get('translator')->trans('form.networkfunction.edit.message.success', [], 'networkfunction'));

                return $this->redirect($this->generateUrl('networkfunction_edit', ['id' => $networkfunction->getId()]));

                } catch(\Exception $e){
                    $request->getSession()->getFlashBag()
                    ->add('error',  $this->get('translator')->trans('form.networkfunction.edit.message.error', [], 'networkfunction'));
                    $this->get('logger')->error($e->getMessage());
                }

    }

        $deleteForm = $this->createDeleteForm($networkfunction->getId(), 'networkfunction_delete');

        return $this->render('AppBundle:networkfunction:edit.html.twig', [
            'networkfunction' => $networkfunction,
            'form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }    /**
     * Save order.
     *
     * @Route("/order/{field}/{type}", name="networkfunction_sort")
     */
    public function sortAction($field, $type)
    {
        $this->setOrder('networkfunction', $field, $type);

        return $this->redirect($this->generateUrl('networkfunction'));
    }

    /**
     * @param string $name  session name
     * @param string $field field name
     * @param string $type  sort type ("ASC"/"DESC")
     */
    protected function setOrder($name, $field, $type = 'ASC')
    {
        $this->get('session')->set('sort.' . $name, ['field' => $field, 'type' => $type]);
    }

    /**
     * @param  string $name
     * @return array
     */
    protected function getOrder($name)
    {
        $session = $this->get('session');

        return $session->has('sort.' . $name) ? $session->get('sort.' . $name) : null;
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $name
     */
    protected function addQueryBuilderSort(QueryBuilder $qb, $name)
    {
        $alias = current($qb->getDQLPart('from'))->getAlias();
        if (is_array($order = $this->getOrder($name))) {
            $qb->orderBy($alias . '.' . $order['field'], $order['type']);
        }
    }

    /**
     * Save filters
     *
     * @param  FormInterface $form
     * @param  string        $name   route/entity name
     * @param  string        $route  route name, if different from entity name
     * @param  array         $params possible route parameters
     * @return Response
     */
    protected function saveFilter(FormInterface $form, $name, $route = null, array $params = [])
    {
        $request = $this->get('request_stack')->getCurrentRequest();
        $url = $this->generateUrl($route ?: $name, $params);
        if ($request->query->has('submit-filter') && $form->handleRequest($request)->isValid()) {
            $request->getSession()->set('filter.' . $name, $request->query->get($form->getName()));

            return $this->redirect($url);
        } elseif ($request->query->has('reset-filter')) {
            $request->getSession()->set('filter.' . $name, null);

            return $this->redirect($url);
        }
    }

    /**
     * Filter form
     *
     * @param  FormInterface                                       $form
     * @param  QueryBuilder                                        $qb
     * @param  string                                              $name
     * @return \Knp\Component\Pager\Pagination\PaginationInterface
     */
    protected function filter(FormInterface $form, QueryBuilder $qb, $name, $maxItemPerPage)
    {
        if (!is_null($values = $this->getFilter($name))) {
            if ($form->submit($values)->isValid()) {
                $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $qb);
            }
        }

        // possible sorting
        $this->addQueryBuilderSort($qb, $name);
        $request = $this->get('request_stack')->getCurrentRequest();
        $query = $qb->getQuery();

        return $this->get('knp_paginator')->paginate($query, $request->query->getInt('page', 1), $request->query->getInt('limit', $maxItemPerPage));
    }

    /**
     * Get filters from session
     *
     * @param  string $name
     * @return array
     */
    protected function getFilter($name)
    {
        return $this->get('session')->get('filter.' . $name);
    }
    /**
    * @Route("/{id}/delete-confirmation", name="networkfunction_delete_confirmation")
    * @Method("GET")
    */
    public function deleteConfirmationAction(NetworkFunction $networkfunction)
    {
        $deleteForm = $this->createDeleteForm($networkfunction->getId(), 'networkfunction_delete');

        return $this->render('AppBundle:networkfunction:delete.confirm.html.twig', array(
            'networkfunction' => $networkfunction,
            'delete_form' => $deleteForm->createView(),
        ));
    }



    /**
     * Deletes a NetworkFunction entity.
     *
     * @Route("/{id}/delete", name="networkfunction_delete", requirements={"id"="\d+"})
     * @Method("DELETE")
     */
    public function deleteAction(NetworkFunction $networkfunction, Request $request)
    {
        $form = $this->createDeleteForm($networkfunction->getId(), 'networkfunction_delete');
        if ($form->handleRequest($request)->isValid()) {
            try{
                $this->getDoctrine()->getManager()->remove($networkfunction);
                $this->getDoctrine()->getManager()->flush();

                $request->getSession()->getFlashBag()
                  ->add('success', $this->get('translator')->trans('form.networkfunction.delete.message.success', [], 'networkfunction'));

            } catch(\Exception $e){
                $request->getSession()->getFlashBag()
                ->add('error',  $this->get('translator')->trans('form.networkfunction.delete.message.error', [], 'networkfunction'));
                $this->get('logger')->error($e->getMessage());
            }
        }
        return $this->redirect($this->generateUrl('networkfunction'));
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
