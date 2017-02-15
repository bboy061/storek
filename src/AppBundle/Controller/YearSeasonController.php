<?php

namespace AppBundle\Controller;

use AppBundle\Entity\YearSeason;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Yearseason controller.
 *
 * @Route("admin/yearseason")
 */
class YearSeasonController extends Controller
{
    /**
     * Lists all yearSeason entities.
     *
     * @Route("/", name="yearseason_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $yearSeasons = $em->getRepository('AppBundle:YearSeason')->findAll();

        return $this->render('yearseason/index.html.twig', array(
            'yearSeasons' => $yearSeasons,
        ));
    }

    /**
     * Creates a new yearSeason entity.
     *
     * @Route("/new", name="yearseason_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $yearSeason = new Yearseason();
        $form = $this->createForm('AppBundle\Form\YearSeasonType', $yearSeason);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($yearSeason);
            $em->flush($yearSeason);

            return $this->redirectToRoute('yearseason_show', array('id' => $yearSeason->getId()));
        }

        return $this->render('yearseason/new.html.twig', array(
            'yearSeason' => $yearSeason,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a yearSeason entity.
     *
     * @Route("/{id}", name="yearseason_show")
     * @Method("GET")
     */
    public function showAction(YearSeason $yearSeason)
    {
        $deleteForm = $this->createDeleteForm($yearSeason);

        return $this->render('yearseason/show.html.twig', array(
            'yearSeason' => $yearSeason,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing yearSeason entity.
     *
     * @Route("/{id}/edit", name="yearseason_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, YearSeason $yearSeason)
    {
        $deleteForm = $this->createDeleteForm($yearSeason);
        $editForm = $this->createForm('AppBundle\Form\YearSeasonType', $yearSeason);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('yearseason_edit', array('id' => $yearSeason->getId()));
        }

        return $this->render('yearseason/edit.html.twig', array(
            'yearSeason' => $yearSeason,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a yearSeason entity.
     *
     * @Route("/{id}", name="yearseason_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, YearSeason $yearSeason)
    {
        $form = $this->createDeleteForm($yearSeason);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($yearSeason);
            $em->flush($yearSeason);
        }

        return $this->redirectToRoute('yearseason_index');
    }

    /**
     * Creates a form to delete a yearSeason entity.
     *
     * @param YearSeason $yearSeason The yearSeason entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(YearSeason $yearSeason)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('yearseason_delete', array('id' => $yearSeason->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
