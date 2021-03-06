<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\Song;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Song controller.
 *
 * @Route("song")
 */
class SongController extends Controller
{
    /**
     * Lists all song entities.
     *
     * @Route("/", name="song_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $songs = $em->getRepository('BackendBundle:Song')->findAll();

        return $this->render('song/index.html.twig', array(
            'songs' => $songs,
        ));
    }

    /**
     * Creates a new song entity.
     *
     * @Route("/new", name="song_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $song = new Song();
        $form = $this->createForm('BackendBundle\Form\SongType', $song);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($song);
            $em->flush($song);

            return $this->redirectToRoute('song_show', array('id' => $song->getId()));
        }

        return $this->render('song/new.html.twig', array(
            'song' => $song,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a song entity.
     *
     * @Route("/{id}", name="song_show")
     * @Method("GET")
     */
    public function showAction(Song $song)
    {
        $deleteForm = $this->createDeleteForm($song);

        return $this->render('song/show.html.twig', array(
            'song' => $song,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing song entity.
     *
     * @Route("/{id}/edit", name="song_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Song $song)
    {
        $deleteForm = $this->createDeleteForm($song);
        $editForm = $this->createForm('BackendBundle\Form\SongType', $song);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('song_edit', array('id' => $song->getId()));
        }

        return $this->render('song/edit.html.twig', array(
            'song' => $song,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a song entity.
     *
     * @Route("/{id}", name="song_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Song $song)
    {
        $form = $this->createDeleteForm($song);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($song);
            $em->flush($song);
        }

        return $this->redirectToRoute('song_index');
    }

    /**
     * Creates a form to delete a song entity.
     *
     * @param Song $song The song entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Song $song)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('song_delete', array('id' => $song->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
