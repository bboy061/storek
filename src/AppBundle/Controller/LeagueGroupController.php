<?php

namespace AppBundle\Controller;

use AppBundle\Entity\LeagueGroup;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Leaguegroup controller.
 *
 * @Route("admin/leaguegroup")
 */
class LeagueGroupController extends Controller
{
    /**
     * Lists all leagueGroup entities.
     *
     * @Route("/", name="admin_leaguegroup_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $leagueGroups = $em->getRepository('AppBundle:LeagueGroup')->findAll();

        return $this->render('leaguegroup/index.html.twig', array(
            'leagueGroups' => $leagueGroups,
        ));
    }

    /**
     * Creates a new leagueGroup entity.
     *
     * @Route("/new", name="admin_leaguegroup_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $leagueGroup = new Leaguegroup();
        $form = $this->createForm('AppBundle\Form\LeagueGroupType', $leagueGroup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($leagueGroup);
            $em->flush($leagueGroup);

            return $this->redirectToRoute('admin_leaguegroup_show', array('id' => $leagueGroup->getId()));
        }

        return $this->render('leaguegroup/new.html.twig', array(
            'leagueGroup' => $leagueGroup,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a leagueGroup entity.
     *
     * @Route("/{id}", name="admin_leaguegroup_show")
     * @Method("GET")
     */
    public function showAction(LeagueGroup $leagueGroup)
    {
        $deleteForm = $this->createDeleteForm($leagueGroup);

        return $this->render('leaguegroup/show.html.twig', array(
            'leagueGroup' => $leagueGroup,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing leagueGroup entity.
     *
     * @Route("/{id}/edit", name="admin_leaguegroup_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LeagueGroup $leagueGroup)
    {
        $deleteForm = $this->createDeleteForm($leagueGroup);
        $editForm = $this->createForm('AppBundle\Form\LeagueGroupType', $leagueGroup);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_leaguegroup_edit', array('id' => $leagueGroup->getId()));
        }

        return $this->render('leaguegroup/edit.html.twig', array(
            'leagueGroup' => $leagueGroup,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a leagueGroup entity.
     *
     * @Route("/{id}", name="admin_leaguegroup_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LeagueGroup $leagueGroup)
    {
        $form = $this->createDeleteForm($leagueGroup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($leagueGroup);
            $em->flush($leagueGroup);
        }

        return $this->redirectToRoute('admin_leaguegroup_index');
    }

    /**
     * Creates a form to delete a leagueGroup entity.
     *
     * @param LeagueGroup $leagueGroup The leagueGroup entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LeagueGroup $leagueGroup)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_leaguegroup_delete', array('id' => $leagueGroup->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
