<?php

namespace FrontendBundle\Controller;

use BackendBundle\Entity\Genre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/genre")
 */
class GenreController extends Controller
{

	/**
     * @Route("/list", name="genre_list")
     */
    public function IndexAction()
    {
    	$em=$this->getDoctrine()->getManager();

        $genres = $em->getRepository('BackendBundle:Genre')->findAll();

        return $this->render('FrontendBundle:Genre:index.html.twig', array(
            "genres"=>$genres
        ));
    }

    /**
     * @Route("/detail/{id}", name="genre_detail")
     */
    public function showAction(Genre $genre)
    {

        return $this->render('FrontendBundle:Genre:show.html.twig', array(
            'genre' => $genre,
        ));
    }

}
