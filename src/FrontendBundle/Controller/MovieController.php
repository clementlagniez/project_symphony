<?php

namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * @Route("/movie")
 */
class MovieController extends Controller
{

	/**
     * @Route("/list", name="movie_list")
     */
    public function IndexAction()
    {
    	$em=$this->getDoctrine()->getManager();

        $movies = $em->getRepository('BackendBundle:Movie')->findAll();

        return $this->render('FrontendBundle:Movie:index.html.twig', array(
            "movies"=>$movies
        ));
    }

    /**
     * @Route("/detail", name="movie_detail")
     */
    public function showAction(Movie $movie)
    {
        $deleteForm = $this->createDeleteForm($movie);

        return $this->render('movie/show.html.twig', array(
            'movie' => $movie,
            'delete_form' => $deleteForm->createView(),
        ));
    }

}
