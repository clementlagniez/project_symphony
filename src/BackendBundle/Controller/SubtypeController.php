<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\Subtype;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Subtype controller.
 *
 * @Route("subtype")
 */
class SubtypeController extends Controller
{
    /**
     * Lists all subtype entities.
     *
     * @Route("/", name="subtype_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $subtypes = $em->getRepository('BackendBundle:Subtype')->findAll();

        return $this->render('subtype/index.html.twig', array(
            'subtypes' => $subtypes,
        ));
    }

    /**
     * Creates a new subtype entity.
     *
     * @Route("/new", name="subtype_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $subtype = new Subtype();
        $form = $this->createForm('BackendBundle\Form\SubtypeType', $subtype);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($subtype);
            $em->flush($subtype);

            return $this->redirectToRoute('subtype_show', array('id' => $subtype->getId()));
        }

        return $this->render('subtype/new.html.twig', array(
            'subtype' => $subtype,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a subtype entity.
     *
     * @Route("/{id}", name="subtype_show")
     * @Method("GET")
     */
    public function showAction(Subtype $subtype)
    {
        $deleteForm = $this->createDeleteForm($subtype);

        return $this->render('subtype/show.html.twig', array(
            'subtype' => $subtype,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing subtype entity.
     *
     * @Route("/{id}/edit", name="subtype_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Subtype $subtype)
    {
        $deleteForm = $this->createDeleteForm($subtype);
        $editForm = $this->createForm('BackendBundle\Form\SubtypeType', $subtype);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('subtype_edit', array('id' => $subtype->getId()));
        }

        return $this->render('subtype/edit.html.twig', array(
            'subtype' => $subtype,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a subtype entity.
     *
     * @Route("/{id}", name="subtype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Subtype $subtype)
    {
        $form = $this->createDeleteForm($subtype);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($subtype);
            $em->flush($subtype);
        }

        return $this->redirectToRoute('subtype_index');
    }

    /**
     * Creates a form to delete a subtype entity.
     *
     * @param Subtype $subtype The subtype entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Subtype $subtype)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('subtype_delete', array('id' => $subtype->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
