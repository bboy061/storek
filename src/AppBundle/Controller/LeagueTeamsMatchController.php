<?php

namespace AppBundle\Controller;

use AppBundle\Entity\LeagueTeamsMatch;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Leagueteamsmatch controller.
 *
 * @Route("admin/leagueteamsmatch")
 */
class LeagueTeamsMatchController extends Controller
{
    /**
     * Lists all leagueTeamsMatch entities.
     *
     * @Route("/", name="admin_leagueteamsmatch_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $leagueTeamsMatches = $em->getRepository('AppBundle:LeagueTeamsMatch')->findAll();

        return $this->render('leagueteamsmatch/index.html.twig', array(
            'leagueTeamsMatches' => $leagueTeamsMatches,
        ));
    }

    /**
     * Creates a new leagueTeamsMatch entity.
     *
     * @Route("/new", name="admin_leagueteamsmatch_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $leagueTeamsMatch = new Leagueteamsmatch();
        $form = $this->createForm('AppBundle\Form\LeagueTeamsMatchType', $leagueTeamsMatch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($leagueTeamsMatch);
            $em->flush($leagueTeamsMatch);

            return $this->redirectToRoute('admin_leagueteamsmatch_show', array('id' => $leagueTeamsMatch->getId()));
        }

        return $this->render('leagueteamsmatch/new.html.twig', array(
            'leagueTeamsMatch' => $leagueTeamsMatch,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a leagueTeamsMatch entity.
     *
     * @Route("/{id}", name="admin_leagueteamsmatch_show")
     * @Method("GET")
     */
    public function showAction(LeagueTeamsMatch $leagueTeamsMatch)
    {
        $deleteForm = $this->createDeleteForm($leagueTeamsMatch);

        return $this->render('leagueteamsmatch/show.html.twig', array(
            'leagueTeamsMatch' => $leagueTeamsMatch,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing leagueTeamsMatch entity.
     *
     * @Route("/{id}/edit", name="admin_leagueteamsmatch_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LeagueTeamsMatch $leagueTeamsMatch)
    {
        $deleteForm = $this->createDeleteForm($leagueTeamsMatch);
        $editForm = $this->createForm('AppBundle\Form\LeagueTeamsMatchType', $leagueTeamsMatch);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_leagueteamsmatch_edit', array('id' => $leagueTeamsMatch->getId()));
        }

        return $this->render('leagueteamsmatch/edit.html.twig', array(
            'leagueTeamsMatch' => $leagueTeamsMatch,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a leagueTeamsMatch entity.
     *
     * @Route("/{id}", name="admin_leagueteamsmatch_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LeagueTeamsMatch $leagueTeamsMatch)
    {
        $form = $this->createDeleteForm($leagueTeamsMatch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($leagueTeamsMatch);
            $em->flush($leagueTeamsMatch);
        }

        return $this->redirectToRoute('admin_leagueteamsmatch_index');
    }

    /**
     * Creates a form to delete a leagueTeamsMatch entity.
     *
     * @param LeagueTeamsMatch $leagueTeamsMatch The leagueTeamsMatch entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LeagueTeamsMatch $leagueTeamsMatch)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_leagueteamsmatch_delete', array('id' => $leagueTeamsMatch->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
