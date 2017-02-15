<?php

namespace AppBundle\Controller;

use AppBundle\Entity\LeagueDoublesMatch;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Leaguedoublesmatch controller.
 *
 * @Route("admin/leaguedoublesmatch")
 */
class LeagueDoublesMatchController extends Controller
{
    /**
     * Lists all leagueDoublesMatch entities.
     *
     * @Route("/", name="admin_leaguedoublesmatch_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $leagueDoublesMatches = $em->getRepository('AppBundle:LeagueDoublesMatch')->findAll();

        return $this->render('leaguedoublesmatch/index.html.twig', array(
            'leagueDoublesMatches' => $leagueDoublesMatches,
        ));
    }

    /**
     * Creates a new leagueDoublesMatch entity.
     *
     * @Route("/new", name="admin_leaguedoublesmatch_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $leagueDoublesMatch = new Leaguedoublesmatch();
        $form = $this->createForm('AppBundle\Form\LeagueDoublesMatchType', $leagueDoublesMatch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($leagueDoublesMatch);
            $em->flush($leagueDoublesMatch);

            return $this->redirectToRoute('admin_leaguedoublesmatch_show', array('id' => $leagueDoublesMatch->getId()));
        }

        return $this->render('leaguedoublesmatch/new.html.twig', array(
            'leagueDoublesMatch' => $leagueDoublesMatch,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a leagueDoublesMatch entity.
     *
     * @Route("/{id}", name="admin_leaguedoublesmatch_show")
     * @Method("GET")
     */
    public function showAction(LeagueDoublesMatch $leagueDoublesMatch)
    {
        $deleteForm = $this->createDeleteForm($leagueDoublesMatch);

        return $this->render('leaguedoublesmatch/show.html.twig', array(
            'leagueDoublesMatch' => $leagueDoublesMatch,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing leagueDoublesMatch entity.
     *
     * @Route("/{id}/edit", name="admin_leaguedoublesmatch_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LeagueDoublesMatch $leagueDoublesMatch)
    {
        $deleteForm = $this->createDeleteForm($leagueDoublesMatch);
        $editForm = $this->createForm('AppBundle\Form\LeagueDoublesMatchType', $leagueDoublesMatch);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_leaguedoublesmatch_edit', array('id' => $leagueDoublesMatch->getId()));
        }

        return $this->render('leaguedoublesmatch/edit.html.twig', array(
            'leagueDoublesMatch' => $leagueDoublesMatch,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a leagueDoublesMatch entity.
     *
     * @Route("/{id}", name="admin_leaguedoublesmatch_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LeagueDoublesMatch $leagueDoublesMatch)
    {
        $form = $this->createDeleteForm($leagueDoublesMatch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($leagueDoublesMatch);
            $em->flush($leagueDoublesMatch);
        }

        return $this->redirectToRoute('admin_leaguedoublesmatch_index');
    }

    /**
     * Creates a form to delete a leagueDoublesMatch entity.
     *
     * @param LeagueDoublesMatch $leagueDoublesMatch The leagueDoublesMatch entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LeagueDoublesMatch $leagueDoublesMatch)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_leaguedoublesmatch_delete', array('id' => $leagueDoublesMatch->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
