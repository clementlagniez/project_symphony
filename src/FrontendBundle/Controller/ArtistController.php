<?php

namespace FrontendBundle\Controller;

use BackendBundle\Entity\Artist;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/artist")
 */
class ArtistController extends Controller
{
    /**
     * @Route("/list", name="artist_list")
     */
    public function IndexAction()
    {
    	$em=$this->getDoctrine()->getManager();

        $artists = $em->getRepository('BackendBundle:Artist')->findAll();

        return $this->render('FrontendBundle:Artist:index.html.twig', array(
            "artists"=>$artists
        ));
    }

    /**
     * @Route("/detail/{id}", name="artist_detail")
     */
    public function showAction(Artist $artist)
    {

        return $this->render('FrontendBundle:Artist:show.html.twig', array(
            'artist' => $artist,
        ));
    }

}
