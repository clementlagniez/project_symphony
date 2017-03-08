<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\Band;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Band controller.
 *
 * @Route("band")
 */
class BandController extends Controller
{
    /**
     * Lists all band entities.
     *
     * @Route("/", name="band_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bands = $em->getRepository('BackendBundle:Band')->findAll();

        return $this->render('band/index.html.twig', array(
            'bands' => $bands,
        ));
    }

    /**
     * Creates a new band entity.
     *
     * @Route("/new", name="band_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $band = new Band();
        $form = $this->createForm('BackendBundle\Form\BandType', $band);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($band);
            $em->flush($band);

            return $this->redirectToRoute('band_show', array('id' => $band->getId()));
        }

        return $this->render('band/new.html.twig', array(
            'band' => $band,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a band entity.
     *
     * @Route("/{id}", name="band_show")
     * @Method("GET")
     */
    public function showAction(Band $band)
    {
        $deleteForm = $this->createDeleteForm($band);

        return $this->render('band/show.html.twig', array(
            'band' => $band,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing band entity.
     *
     * @Route("/{id}/edit", name="band_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Band $band)
    {
        $deleteForm = $this->createDeleteForm($band);
        $editForm = $this->createForm('BackendBundle\Form\BandType', $band);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('band_edit', array('id' => $band->getId()));
        }

        return $this->render('band/edit.html.twig', array(
            'band' => $band,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a band entity.
     *
     * @Route("/{id}", name="band_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Band $band)
    {
        $form = $this->createDeleteForm($band);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($band);
            $em->flush($band);
        }

        return $this->redirectToRoute('band_index');
    }

    /**
     * Creates a form to delete a band entity.
     *
     * @param Band $band The band entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Band $band)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('band_delete', array('id' => $band->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
