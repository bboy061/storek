<?php

namespace AppBundle\Controller;

use AppBundle\Entity\LeagueMatch;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Leaguematch controller.
 *
 * @Route("admin/leaguematch")
 */
class LeagueMatchController extends Controller
{
    /**
     * Lists all leagueMatch entities.
     *
     * @Route("/", name="admin_leaguematch_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $leagueMatches = $em->getRepository('AppBundle:LeagueMatch')->findAll();

        return $this->render('leaguematch/index.html.twig', array(
            'leagueMatches' => $leagueMatches,
        ));
    }

    /**
     * Creates a new leagueMatch entity.
     *
     * @Route("/new", name="admin_leaguematch_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $leagueMatch = new Leaguematch();
        $form = $this->createForm('AppBundle\Form\LeagueMatchType', $leagueMatch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($leagueMatch);
            $em->flush($leagueMatch);

            return $this->redirectToRoute('admin_leaguematch_show', array('id' => $leagueMatch->getId()));
        }

        return $this->render('leaguematch/new.html.twig', array(
            'leagueMatch' => $leagueMatch,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a leagueMatch entity.
     *
     * @Route("/{id}", name="admin_leaguematch_show")
     * @Method("GET")
     */
    public function showAction(LeagueMatch $leagueMatch)
    {
        $deleteForm = $this->createDeleteForm($leagueMatch);

        return $this->render('leaguematch/show.html.twig', array(
            'leagueMatch' => $leagueMatch,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing leagueMatch entity.
     *
     * @Route("/{id}/edit", name="admin_leaguematch_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LeagueMatch $leagueMatch)
    {
        $deleteForm = $this->createDeleteForm($leagueMatch);
        $editForm = $this->createForm('AppBundle\Form\LeagueMatchType', $leagueMatch);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_leaguematch_edit', array('id' => $leagueMatch->getId()));
        }

        return $this->render('leaguematch/edit.html.twig', array(
            'leagueMatch' => $leagueMatch,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a leagueMatch entity.
     *
     * @Route("/{id}", name="admin_leaguematch_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LeagueMatch $leagueMatch)
    {
        $form = $this->createDeleteForm($leagueMatch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($leagueMatch);
            $em->flush($leagueMatch);
        }

        return $this->redirectToRoute('admin_leaguematch_index');
    }

    /**
     * Creates a form to delete a leagueMatch entity.
     *
     * @param LeagueMatch $leagueMatch The leagueMatch entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LeagueMatch $leagueMatch)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_leaguematch_delete', array('id' => $leagueMatch->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
