<?php

namespace FrontendBundle\Controller;

use BackendBundle\Entity\Track;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/track")
 */
class TrackController extends Controller
{

	/**
     * @Route("/list", name="track_list")
     */
    public function IndexAction()
    {
    	$em=$this->getDoctrine()->getManager();

        $tracks = $em->getRepository('BackendBundle:Track')->findAll();

        return $this->render('FrontendBundle:Track:index.html.twig', array(
            "tracks"=>$tracks
        ));
    }


    /**
     * @Route("/detail/{id}", name="track_detail")
     */
    public function showAction(Track $track)
    {

        return $this->render('FrontendBundle:Track:show.html.twig', array(
            'track' => $track,
        ));
    }

}
