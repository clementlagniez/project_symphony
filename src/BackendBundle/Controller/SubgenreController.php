<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\Subgenre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Subgenre controller.
 *
 * @Route("subgenre")
 */
class SubgenreController extends Controller
{
    /**
     * Lists all subgenre entities.
     *
     * @Route("/", name="subgenre_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $subgenres = $em->getRepository('BackendBundle:Subgenre')->findAll();

        return $this->render('subgenre/index.html.twig', array(
            'subgenres' => $subgenres,
        ));
    }

    /**
     * Creates a new subgenre entity.
     *
     * @Route("/new", name="subgenre_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $subgenre = new Subgenre();
        $form = $this->createForm('BackendBundle\Form\SubgenreType', $subgenre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($subgenre);
            $em->flush($subgenre);

            return $this->redirectToRoute('subgenre_show', array('id' => $subgenre->getId()));
        }

        return $this->render('subgenre/new.html.twig', array(
            'subgenre' => $subgenre,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a subgenre entity.
     *
     * @Route("/{id}", name="subgenre_show")
     * @Method("GET")
     */
    public function showAction(Subgenre $subgenre)
    {
        $deleteForm = $this->createDeleteForm($subgenre);

        return $this->render('subgenre/show.html.twig', array(
            'subgenre' => $subgenre,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing subgenre entity.
     *
     * @Route("/{id}/edit", name="subgenre_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Subgenre $subgenre)
    {
        $deleteForm = $this->createDeleteForm($subgenre);
        $editForm = $this->createForm('BackendBundle\Form\SubgenreType', $subgenre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('subgenre_edit', array('id' => $subgenre->getId()));
        }

        return $this->render('subgenre/edit.html.twig', array(
            'subgenre' => $subgenre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a subgenre entity.
     *
     * @Route("/{id}", name="subgenre_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Subgenre $subgenre)
    {
        $form = $this->createDeleteForm($subgenre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($subgenre);
            $em->flush($subgenre);
        }

        return $this->redirectToRoute('subgenre_index');
    }

    /**
     * Creates a form to delete a subgenre entity.
     *
     * @param Subgenre $subgenre The subgenre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Subgenre $subgenre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('subgenre_delete', array('id' => $subgenre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
