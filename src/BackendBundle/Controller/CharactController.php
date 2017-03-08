<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\Charact;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Charact controller.
 *
 * @Route("charact")
 */
class CharactController extends Controller
{
    /**
     * Lists all charact entities.
     *
     * @Route("/", name="charact_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $characts = $em->getRepository('BackendBundle:Charact')->findAll();

        return $this->render('charact/index.html.twig', array(
            'characts' => $characts,
        ));
    }

    /**
     * Creates a new charact entity.
     *
     * @Route("/new", name="charact_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $charact = new Charact();
        $form = $this->createForm('BackendBundle\Form\CharactType', $charact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($charact);
            $em->flush($charact);

            return $this->redirectToRoute('charact_show', array('id' => $charact->getId()));
        }

        return $this->render('charact/new.html.twig', array(
            'charact' => $charact,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a charact entity.
     *
     * @Route("/{id}", name="charact_show")
     * @Method("GET")
     */
    public function showAction(Charact $charact)
    {
        $deleteForm = $this->createDeleteForm($charact);

        return $this->render('charact/show.html.twig', array(
            'charact' => $charact,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing charact entity.
     *
     * @Route("/{id}/edit", name="charact_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Charact $charact)
    {
        $deleteForm = $this->createDeleteForm($charact);
        $editForm = $this->createForm('BackendBundle\Form\CharactType', $charact);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('charact_edit', array('id' => $charact->getId()));
        }

        return $this->render('charact/edit.html.twig', array(
            'charact' => $charact,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a charact entity.
     *
     * @Route("/{id}", name="charact_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Charact $charact)
    {
        $form = $this->createDeleteForm($charact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($charact);
            $em->flush($charact);
        }

        return $this->redirectToRoute('charact_index');
    }

    /**
     * Creates a form to delete a charact entity.
     *
     * @param Charact $charact The charact entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Charact $charact)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('charact_delete', array('id' => $charact->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
