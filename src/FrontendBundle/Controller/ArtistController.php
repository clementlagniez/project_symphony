<?php

namespace FrontendBundle\Controller;

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

}
