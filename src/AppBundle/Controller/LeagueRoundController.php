<?php

namespace AppBundle\Controller;

use AppBundle\Entity\LeagueRound;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Leagueround controller.
 *
 * @Route("admin/leagueround")
 */
class LeagueRoundController extends Controller
{
    /**
     * Lists all leagueRound entities.
     *
     * @Route("/", name="admin_leagueround_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $leagueRounds = $em->getRepository('AppBundle:LeagueRound')->findAll();

        return $this->render('leagueround/index.html.twig', array(
            'leagueRounds' => $leagueRounds,
        ));
    }

    /**
     * Creates a new leagueRound entity.
     *
     * @Route("/new", name="admin_leagueround_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $leagueRound = new Leagueround();
        $form = $this->createForm('AppBundle\Form\LeagueRoundType', $leagueRound);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($leagueRound);
            $em->flush($leagueRound);

            return $this->redirectToRoute('admin_leagueround_show', array('id' => $leagueRound->getId()));
        }

        return $this->render('leagueround/new.html.twig', array(
            'leagueRound' => $leagueRound,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a leagueRound entity.
     *
     * @Route("/{id}", name="admin_leagueround_show")
     * @Method("GET")
     */
    public function showAction(LeagueRound $leagueRound)
    {
        $deleteForm = $this->createDeleteForm($leagueRound);

        return $this->render('leagueround/show.html.twig', array(
            'leagueRound' => $leagueRound,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing leagueRound entity.
     *
     * @Route("/{id}/edit", name="admin_leagueround_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LeagueRound $leagueRound)
    {
        $deleteForm = $this->createDeleteForm($leagueRound);
        $editForm = $this->createForm('AppBundle\Form\LeagueRoundType', $leagueRound);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_leagueround_edit', array('id' => $leagueRound->getId()));
        }

        return $this->render('leagueround/edit.html.twig', array(
            'leagueRound' => $leagueRound,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a leagueRound entity.
     *
     * @Route("/{id}", name="admin_leagueround_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LeagueRound $leagueRound)
    {
        $form = $this->createDeleteForm($leagueRound);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($leagueRound);
            $em->flush($leagueRound);
        }

        return $this->redirectToRoute('admin_leagueround_index');
    }

    /**
     * Creates a form to delete a leagueRound entity.
     *
     * @param LeagueRound $leagueRound The leagueRound entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LeagueRound $leagueRound)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_leagueround_delete', array('id' => $leagueRound->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
