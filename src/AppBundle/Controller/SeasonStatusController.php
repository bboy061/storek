<?php

namespace AppBundle\Controller;

use AppBundle\Entity\SeasonStatus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Seasonstatus controller.
 *
 * @Route("admin/seasonstatus")
 */
class SeasonStatusController extends Controller
{
    /**
     * Lists all seasonStatus entities.
     *
     * @Route("/", name="admin_seasonstatus_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $seasonStatuses = $em->getRepository('AppBundle:SeasonStatus')->findAll();

        return $this->render('seasonstatus/index.html.twig', array(
            'seasonStatuses' => $seasonStatuses,
        ));
    }

    /**
     * Creates a new seasonStatus entity.
     *
     * @Route("/new", name="admin_seasonstatus_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $seasonStatus = new Seasonstatus();
        $form = $this->createForm('AppBundle\Form\SeasonStatusType', $seasonStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($seasonStatus);
            $em->flush($seasonStatus);

            return $this->redirectToRoute('admin_seasonstatus_show', array('id' => $seasonStatus->getId()));
        }

        return $this->render('seasonstatus/new.html.twig', array(
            'seasonStatus' => $seasonStatus,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a seasonStatus entity.
     *
     * @Route("/{id}", name="admin_seasonstatus_show")
     * @Method("GET")
     */
    public function showAction(SeasonStatus $seasonStatus)
    {
        $deleteForm = $this->createDeleteForm($seasonStatus);

        return $this->render('seasonstatus/show.html.twig', array(
            'seasonStatus' => $seasonStatus,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing seasonStatus entity.
     *
     * @Route("/{id}/edit", name="admin_seasonstatus_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SeasonStatus $seasonStatus)
    {
        $deleteForm = $this->createDeleteForm($seasonStatus);
        $editForm = $this->createForm('AppBundle\Form\SeasonStatusType', $seasonStatus);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_seasonstatus_edit', array('id' => $seasonStatus->getId()));
        }

        return $this->render('seasonstatus/edit.html.twig', array(
            'seasonStatus' => $seasonStatus,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a seasonStatus entity.
     *
     * @Route("/{id}", name="admin_seasonstatus_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SeasonStatus $seasonStatus)
    {
        $form = $this->createDeleteForm($seasonStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($seasonStatus);
            $em->flush($seasonStatus);
        }

        return $this->redirectToRoute('admin_seasonstatus_index');
    }

    /**
     * Creates a form to delete a seasonStatus entity.
     *
     * @param SeasonStatus $seasonStatus The seasonStatus entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SeasonStatus $seasonStatus)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_seasonstatus_delete', array('id' => $seasonStatus->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
