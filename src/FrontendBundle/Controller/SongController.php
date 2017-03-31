<?php

namespace FrontendBundle\Controller;

use BackendBundle\Entity\Song;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * @Route("/song")
 */
class SongController extends Controller
{

	/**
     * @Route("/list", name="song_list")
     */
    public function IndexAction()
    {
    	$em=$this->getDoctrine()->getManager();

        $songs = $em->getRepository('BackendBundle:Song')->findAll();

        return $this->render('FrontendBundle:Song:index.html.twig', array(
            "songs"=>$songs
        ));
    }


    /**
     * @Route("/detail/{id}", name="song_detail")
     */
    public function showAction(Song $song)
    {

        return $this->render('FrontendBundle:Song:show.html.twig', array(
            'song' => $song,
        ));
    }

}
